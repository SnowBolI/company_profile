<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKontak extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'status','email','subjek','pesan', 'tanggal'];

}
