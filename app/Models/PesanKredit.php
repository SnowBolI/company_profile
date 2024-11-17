<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKredit extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'status','email','subjek','ktp','waktu_pinjaman','tujuan_pinjaman','jaminan','alamat', 'hp','jumlah_pinjaman','tanggal'];

}
