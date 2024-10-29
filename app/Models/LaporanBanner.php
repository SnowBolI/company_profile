<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBanner extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'gambar'];

}
