<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table='Servicio';
    protected $primaryKey ='id_servicio';
    public $timestamps=false;
    

    public $fillable=[ 
    'id_servicio',
    'nombre_servicio',
    'descripcion_servicio',
    'precio_base',
    ];


        
}
