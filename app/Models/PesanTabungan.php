<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanTabungan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'status','email','subjek','ktp','tipe_tabungan','alamat', 'hp','setoran_awal','tanggal'];

}
