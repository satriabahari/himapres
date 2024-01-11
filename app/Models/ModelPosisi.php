<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPosisi extends Model
{
    
    use HasFactory;
    protected $table = 'data_posisi';
    protected $guarded = ['id'];

}

