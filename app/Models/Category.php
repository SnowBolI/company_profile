<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function articles(){
        return $this->belongsToMany(related: Article::class);
        // return $this->belongsToMany(Article::class);
    }
}
