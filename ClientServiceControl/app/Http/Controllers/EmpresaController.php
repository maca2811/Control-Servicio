<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use ClientServiceControl\Empresa;
use IIluminate\Support\Facades\Redirect;
use ClientServiceControl\Http\Request\EmpresaFormRequest;
use App\Contrato;

class EmpresaController extends Controller
{

    public function _construct(){

    }

    public function index(Request $request){
        if(!empty($request)){
        error_log($request);
        $query = trim($request->get('estado'));
        
        
        if($query==3){
            $empresas= Contrato::Join('empresa', 'contrato.id_empresa', '=', 'empresa.id_empresa')
            ->Join('servicio', 'contrato.id_servicio', '=', 'servicio.id_servicio')
            ->Join('usuario', 'contrato.id_encargado', '=', 'usuario.id_usuario')
            ->orderBy('contrato.fecha_vencimiento','DESC')
             ->get();
        }
        else{
            $empresas= Contrato::Join('empresa', 'contrato.id_empresa', '=', 'empresa.id_empresa')
            ->Join('servicio', 'contrato.id_servicio', '=', 'servicio.id_servicio')
            ->Join('usuario', 'contrato.id_encargado', '=', 'usuario.id_usuario')
            ->Where('contrato.estado','=',$query)
            ->orderBy('contrato.fecha_vencimiento','DESC')
            ->get();
        }
        return view('control.empresa.index',["empresas"=>$empresas,"estado"=>$query]);
        }  
    }


    public function create(){
        return view('control.empresa.create');
    }

    public function store(EmpresaFormRequest $request){
        $empresa= new Empresa();
        $empresa->nombre=$request->get('nombre');
        $empresa->descripcion=$request->get('descripcion');
        $empresa->save();
        return redirect('control/empresa');
    }


    public function edit($id){
    }

    public function show($id){
         return view('control.empresa.show',["empresa"=>Empresa::findOrFail($id)]);   
    }
    
    
    public function update(EmpresaFormReuqest $request, $id){
        $empresa->Empresa::findOrFail($id);
        $empresa->nombre=$request->get('nombre');
        $empresa->descripcion=$request->get('descripcion');
        return redirect('control/empresa');

    }
  
    public function destroy($id){
        $empresa->Empresa::findOrFail($id);     
        $empresa->activa='0';
        return redirect('control/empresa');
    }


}