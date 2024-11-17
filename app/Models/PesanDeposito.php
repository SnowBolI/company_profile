<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanDeposito extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'status','email','subjek','ktp','tipe_deposito','alamat', 'hp','setoran_awal','tanggal'];

}
