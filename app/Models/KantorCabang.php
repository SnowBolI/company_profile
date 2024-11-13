<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorCabang extends Model
{
    use HasFactory;
    protected $fillable = ['nama','slug', 'alamat', 'gmap','telepon','gambar'];
    public function kantorcabang()
    {
        return $this->belongsTo(KantorCabang::class, 'kantor_cabang_id');
    }

}
