<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMilestone extends Model
{
    use HasFactory;
    protected $fillable = ['tahun', 'keterangan'];

}
