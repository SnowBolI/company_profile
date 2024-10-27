<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDeposito extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'keterangan', 'gambar'];

}
