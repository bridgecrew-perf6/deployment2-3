<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $table = "equipo";
    protected $primaryKey = "idEquipo";
    public $timestamps = false;
    
    protected $guarded = [];
}
