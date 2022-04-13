<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fechas extends Model
{
    protected $table = "Fechas";
    protected $primaryKey = "idFecha";
    public $timestamps = false;
    
    protected $guarded = [];

}
