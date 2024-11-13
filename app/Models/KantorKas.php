<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorKas extends Model
{
    use HasFactory;
    protected $fillable = ['nama','slug', 'alamat', 'gmap','telepon','gambar', 'kantor_cabang_id'];
    public function kantorkas()
    {
        return $this->hasMany(KantorKas::class, 'kantor_cabang_id');
    }

}

