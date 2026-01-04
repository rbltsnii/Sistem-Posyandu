<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $table = 'imunisasies';

    protected $fillable = [
        'balita_id',
        'tgl_imunisasi',
        'jenis_imunisasi',
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
