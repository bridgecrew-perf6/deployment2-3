<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioInventario extends Model
{
    protected $table = "usuario_inventario";
    protected $primaryKey = "idUsuario";
    public $timestamps = false;
    
    protected $guarded = [];

    public function Inventario(){return $this->belongsTo('App\Models\Inventario');}

    public function scopeName($query, $name){
        if($name)
        return $query->where('nomb_usua','LIKE',"%$name%");
    }

}


