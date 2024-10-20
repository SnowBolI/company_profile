<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function categories(){
        // return $this->belongsToMany(Category::class)->withPivot('category_id');
        return $this->belongsToMany(Category::class)->withPivot('category_id');
    }
}
