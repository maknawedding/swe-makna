<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client_id',
        'tgl_event',
        'rekanan_tenant',
        'harga_jual',
        'nomor_tenant',
        'keterangan',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class); 
    }

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
