<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'nama',
        'tgl_lahir',
        'jenis_kelamin',
        'berat_lahir',
        'tinggi_lahir',
        'alamat',
    ];

    public function orangTua()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penimbangans()
    {
        return $this->hasMany(Penimbangan::class);
    }

    public function imunisasis()
    {
        return $this->hasMany(Imunisasi::class);
    }
}
