<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Servicio;
use App\Usuario;
use App\Rol;
use App\Contrato;

class RecordatorioServicios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recordatorio:servicios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía correos cuando que el servicio de correo, hosting, mantenimiento o dominio';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //SABER SI DEBE ENVIAR CORREO
        $actualizar=false;
        //CONSULTA DE TODOS LOS CONTRATOS
        $contratos= Contrato::orderBy('fecha_vencimiento','DESC')
        ->get();
       
        //ARREGLO PARA LOS USUARIOS DE LA APLICACIÓN
        $usuarios=Usuario::all();


        foreach($contratos as $contrato){
            $fechaActual= date('Y-m-d');
            $fechaHoy = Carbon::parse($fechaActual);
            $fechaVencimiento=Carbon::parse($contrato->fecha_vencimiento);
            $diasDiferencia = $fechaVencimiento->diffInDays($fechaHoy);
            $idContrato=$contrato->id_contrato;
    
            //Contrato de servicio vigente
            if($diasDiferencia >= 30){
                Contrato::where('id_contrato',$idContrato)
                ->update(['estado' => 2]);
            }
            //Contrato de servicio por vencer
            elseif($diasDiferencia<=30 && $diasDiferencia>0 && $diasDiferencia%1==0){
                Contrato::where('id_contrato',$idContrato)
                ->update(['estado' => 1]);
                $actualizar=true;
                error_log($actualizar);
            }
            //Contrato de servicio vencido
            elseif($diasDiferencia<=0){
                Contrato::where('id_contrato',$idContrato)
                ->update(['estado' => 0]);
            }
        }

        if($actualizar){
        //ARREGLO PARA LOS SERVICOS QUE ESTÁN POR VECER
        $servicios=Servicio::Join('contrato','contrato.id_servicio','=', 'servicio.id_servicio' )
        ->Join('empresa','contrato.id_empresa','=', 'empresa.id_empresa' )
        ->Join('usuario','contrato.id_encargado','=', 'usuario.id_usuario' )
        ->where('contrato.estado','=',1)->OrderBy('servicio.nombre_servicio','ASC')->get();
         
        $servicio=new Servicio();
        $servicios->nombre_usuario='sassa';
        $servicios->nombre_empresa='sassa';
        $servicios->nombre_servicio='sassa';

       // Funcion encargada de enviar los correos de los servicios por vencer
       foreach($servicios as $servicio){
        $tipoServicio=$servicio->nombre_servicio;
        $empresa=$servicio->nombre_empresa;
       
        foreach($usuarios as $usuario){
            $correo=$usuario->correo;
            $destinatario=$usuario->nombre_usuario;
            $servicio->nombre_usuario=$destinatario;
          
            //Funcion que permite enviar el correo, revise la vista , un arreglo para poder enviar informacion al correo
            //Además el correo, el nombre del propietario del correo(destinatario) y el servicio que está por vencer 
            Mail::send('emails',['servicio'=>$servicio],function($message) use($correo,$destinatario,$tipoServicio){ 
            $message->from('mcmd.1128@gmail.com','Client Service Control');
            $message->to($correo,$destinatario)->subject('Recordatorio de sevicio de '.$tipoServicio.' próximo a vencer');
            });
         }} 
        }
    }    
}
