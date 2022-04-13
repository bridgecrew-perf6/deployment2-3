<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devops extends Model
{  
    protected $table = "Devops";
    protected $primaryKey = "idDevops";
    public $timestamps = false;
    
    protected $guarded = [];

}
