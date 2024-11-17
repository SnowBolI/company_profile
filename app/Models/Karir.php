<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;
    protected $fillable = ['judul','slug', 'keterangan', 'gambar_utama','gambar_1','gambar_2','gambar_3','hari','tanggal','user_id'];


}
