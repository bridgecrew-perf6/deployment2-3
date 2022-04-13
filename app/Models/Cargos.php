<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = "cargo";
    protected $primaryKey = "idCargo";
    public $timestamps = false;
    
    protected $guarded = [];

}
