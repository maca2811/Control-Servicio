<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use DB;
use Session;
use App\Usuario;
use App\Contrato;

class LoginController extends Controller
{
    public function index(){
        session()->forget('usuario');
         return view('login');
    }

    public function login(Request $request) {
        //Usuario que revise el login
        $correo = trim($request->get('correo'));
        $contrasenia=trim($request->get('contrasenia'));

        //se pregunta si los datos del formulario estan vacios para enviar un mensaje de error si es asi
        if(!empty($correo) && !empty($contrasenia)){
            $usuario= Usuario::Join('rol', 'rol.id_rol', '=', 'usuario.id_rol')
            ->where([['usuario.correo', '=', $correo],
             ['usuario.contrasenia', '=', $contrasenia],])
            ->get()
            ->first();

            if($usuario){
            $empresas=Contrato::Join('empresa', 'contrato.id_empresa', '=', 'empresa.id_empresa')
            ->Join('servicio', 'contrato.id_servicio', '=', 'servicio.id_servicio')
            ->Join('usuario', 'contrato.id_encargado', '=', 'usuario.id_usuario')
            ->orderBy('contrato.fecha_vencimiento','DESC')
            ->get();
            
            //variable de sesion para el usuario actual del sistema
            session(['usuario' => $usuario->nombre_usuario]);

            return view('control.empresa.index',["empresas"=>$empresas]);
            }
            //se envia el mensaje por la contraseña o correo inválidos 
            else{
                return back()->with('error','Correo y/o contraseña inválido');
            } 
        }
        //se envia el mensaje de error ya que no se proporcionaron los datos
        else{
            return back()->with('error','Debe proporcionar el correo y la contraseñia');
        }
       
    }

    public function logout(){
        session()->forget('usuario');
        return view('login');
         
    }
    
}
