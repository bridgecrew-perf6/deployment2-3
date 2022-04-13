<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{

    protected $table = "Proyecto";
    protected $primaryKey = "idProyecto";
    public $timestamps = false;
    
    protected $guarded = [];
}
