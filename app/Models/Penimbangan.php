<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'balita_id',
        'tgl_penimbangan',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'keterangan',
        'kader_id',
    ];

    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }

    public function kader()
    {
        return $this->belongsTo(User::class, 'kader_id');
    }
}
