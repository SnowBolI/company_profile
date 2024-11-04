<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorKas extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'gmap','telepon','gambar', 'kantor_cabang_id'];

}