<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Category;
use App\Models\Field;
use App\Models\Department;
use App\Models\Position;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $with = ['field', 'department', 'position'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

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
                ->orWhere('role', 'like', '%' . $searchAnggota . '%')
                ->orWhere('status', 'like', '%' . $searchAnggota . '%');
        });

        $query->when($filters['searchAdmin'] ?? false, function ($query, $searchAdmin) {
            return $query->where('name', 'like', '%' . $searchAdmin . '%')
                ->orWhere('email', 'like', '%' . $searchAdmin . '%')
                ->orWhere('username', 'like', '%' . $searchAdmin . '%')
                ->orWhere('no_hp', 'like', '%' . $searchAdmin . '%')
                ->orWhere('address', 'like', '%' . $searchAdmin . '%')
                ->orWhere('role', 'like', '%' . $searchAdmin . '%')
                ->orWhere('status', 'like', '%' . $searchAdmin . '%');
        });

        $query->when($filters['field'] ?? false, function ($query, $field) {
            return $query->whereHas('field', function ($query) use ($field) {
                $query->where('slug', $field);
            });
        });

        $query->when($filters['department'] ?? false, function ($query, $department) {
            return $query->whereHas('department', function ($query) use ($department) {
                $query->where('slug', $department);
            });
        });
    }
}
