<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['searchContact'] ?? false, function ($query, $searchContact) {
            return $query->where('name', 'like', '%' . $searchContact . '%')
                ->orWhere('email', 'like', '%' . $searchContact . '%')
                ->orWhere('phone', 'like', '%' . $searchContact . '%')
                ->orWhere('message', 'like', '%' . $searchContact . '%');
        });
    }
}
