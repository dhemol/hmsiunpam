<?php

namespace App\Models;

use App\Enums\TypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Archive extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $casts = [
    //     'type' => TypeEnum::class . ':collection:nullable',
    // ];



    public function getRouteKeyName()
    {
        return 'slug';
    }
}
