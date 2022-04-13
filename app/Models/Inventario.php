<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = "Inventario";
    protected $primaryKey = "idUsuaActivo";
    public $timestamps = false;
    
    protected $guarded = [];

    public function UsuarioInventario(){return $this->belongsTo('App\Models\UsuarioInventario');}

}
