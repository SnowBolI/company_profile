<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeYT extends Model
{
    protected $primaryKey = 'id'; 

    protected $table = 'home_yts';
    protected $fillable = ['judul', 'linkyt'];

    use HasFactory;
}
