<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPesertaEvent extends Model
{
    use HasFactory;
    protected $table = 'peserta_event';
    protected $guarded = ['id'];
}
