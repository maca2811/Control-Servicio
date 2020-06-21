<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table='empresa';
    protected $primaryKey ='id_empresa';
    protected $timestamps=false;
     

    protected $fillable=[ 
    'id_empresa',
    'nombre_empresa',
    'descripcion_empresa',
    'direccion_empresa',
    'correo_empresa',
    'telefono',
    'codigo_postal',
    'activa'
    ];

    protected $guarded=[

    ];
 
  
}
