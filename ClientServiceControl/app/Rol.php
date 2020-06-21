<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='Rol';
    protected $primaryKey ='id_rol';
    public $timestamps=false;


    protected $fillable=[ 
    'id_rol',
    'nombre_rol',
    'descripcion_rol',
    ];

    protected $guarded=[

    ];

}
