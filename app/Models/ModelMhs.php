<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ModelMhs extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $attributes = [
        'qrcode' => "",
        'jabatan' => "Mahasiswa"
    ];
    protected static function booted()
    {
        static::creating(function ($model) {
            // Mengisi kolom qrkode dengan gabungan id dan card_id
            $kode = $model->id + $model->card_id;
            $model->qrcode = Hash::make($kode);
        });
    }
    protected $guarded = ['id'];
}
