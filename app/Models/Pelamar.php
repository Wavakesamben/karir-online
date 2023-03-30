<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';

    protected $fillable = [
        'nama_pelamar',
        'posisi',
        'no_hp',
        'email',
        'ttl',
        'alamat_ktp',
        'alamat_domisili'
    ];
}
