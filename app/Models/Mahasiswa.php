<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama_lengkap', 'jurusan', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'email', 'alamat_tinggal', 'foto'];
}
