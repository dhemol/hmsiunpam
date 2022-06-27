<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['searchEvent'] ?? false, function ($query, $searchEvent) {
            return $query->where('title', 'like', '%' . $searchEvent . '%')
                ->orWhere('location', 'like', '%' . $searchEvent . '%')
                ->orWhere('cost', 'like', '%' . $searchEvent . '%')
                ->orWhere('description', 'like', '%' . $searchEvent . '%')
                ->orWhere('start', 'like', '%' . $searchEvent . '%')
                ->orWhere('end', 'like', '%' . $searchEvent . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
