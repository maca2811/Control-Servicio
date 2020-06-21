<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rol;

class Usuario extends Model
{
    protected $table='Usuario';
    protected $primaryKey ='id_usuario';
    public    $timestamps=false;
    

    protected $fillable=[ 
    'id_usuario',
    'nombre_usuario',
    'correo',
    'contrasenia'
    ];

    protected $guarded=[
        
    ];


    public function rol(){
        return $this->hasOne('App\Rol','id_rol');
    }
    
}
