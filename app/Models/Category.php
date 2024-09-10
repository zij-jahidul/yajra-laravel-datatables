<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function parent_categories()
    {
        return $this->belongsToMany('parent_id', 'categories', 'id');
    }
}
