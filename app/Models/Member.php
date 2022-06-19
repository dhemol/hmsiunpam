<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = ['nama', 'email', 'password', 'alamat', 'no_hp', 'foto'];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['searchAnggota'] ?? false, function ($query, $searchAnggota) {
            return $query->where('name', 'like', '%' . $searchAnggota . '%')
                ->orWhere('email', 'like', '%' . $searchAnggota . '%')
                ->orWhere('username', 'like', '%' . $searchAnggota . '%')
                ->orWhere('no_hp', 'like', '%' . $searchAnggota . '%')
                ->orWhere('address', 'like', '%' . $searchAnggota . '%')
                ->orWhere('position', 'like', '%' . $searchAnggota . '%')
                ->orWhere('images', 'like', '%' . $searchAnggota . '%')
                ->orWhere('role', 'like', '%' . $searchAnggota . '%');
        });
    }
}
