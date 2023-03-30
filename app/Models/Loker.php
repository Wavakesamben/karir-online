<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $table = 'loker';

    protected $fillable = [
        'nama_pekerjaan',
        'slug',
        'deadline',
        'min_pendidikan',
        'persyaratan_umum',
        'persyaratan_berkas',
        'active'
    ];
}
