<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;
    protected $fillable = ['judul','slug', 'keterangan', 'gambar','hari','tanggal','user_id'];


}