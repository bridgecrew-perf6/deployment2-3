<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{

    protected $table = "Layer";
    protected $primaryKey = "idLayer";
    public $timestamps = false;
    
    protected $guarded = [];
}
