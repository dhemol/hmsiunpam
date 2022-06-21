<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }
}
