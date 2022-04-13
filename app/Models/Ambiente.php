<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = "Ambiente";
    protected $primaryKey = "idAmbiente";
    public $timestamps = false;

    protected $guarded = [];

    public function despliegue(){
        return $this->belongsTo('App\Models\Despliegue' , 'idDesp','id');

    }

    
}
