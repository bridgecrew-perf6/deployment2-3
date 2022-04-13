<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Despliegue extends Model
{
    protected $table = "Despliegue";
    protected $primaryKey = "idDesp";
    public $timestamps = false;
    
    protected $guarded = [];

   
    /**
     * Get the user that owns the Despliegue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   
   
}
