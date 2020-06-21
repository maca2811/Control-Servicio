<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table='Contrato';
    protected $primaryKey ='id_contrato';
    public $timestamps=false;

    


    protected $fillable=[ 
    'id_contrato',
    'fecha_contrato',
    'fecha_vencimiento',
    'estado',
    ];

    protected $guarded=[

    ];


    public function encargado(){
        return $this->belongsTo('App\Usuario','id_usuario','id_encargado');
    }

    public function empresa(){
        return $this->belongsTo('App\Empresa','id_empresa','id_empresa');
    }

    public function servicio(){
        return $this->belongsTo('App\Servicio','id_servicio','id_servicio');
    }


    
}
