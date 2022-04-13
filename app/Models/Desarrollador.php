<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrollador extends Model
{
    protected $table = "Desarollador";
    protected $primaryKey = "idDesarollador";
    public $timestamps = false;
    
    protected $guarded = [];

    public function despliegue(){
        return $this->belongsTo('App\Models\Despliegue' , 'idDesp','id');

}
}
