<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'Status';

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
