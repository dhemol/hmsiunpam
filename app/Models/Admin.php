<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
