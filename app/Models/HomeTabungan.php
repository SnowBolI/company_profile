<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTabungan extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'nilai_persentase'];
}