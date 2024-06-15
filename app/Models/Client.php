<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tenant',
        'notlp_tenant',
        'alamat_tenant',
        'whatsapp',
        'email',
    ];
}
