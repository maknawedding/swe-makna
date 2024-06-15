<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'penyelenggara',
        'lokasi',
        'waktu',
        'hargapublish_gold',
        'hargapublish_silver',
        'kota',
        'provinsi',
        'negara',
    ];
}
