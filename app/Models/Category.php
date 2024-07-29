<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function scopeCategory($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->where('name', 'like', '%' . $search . '%')->get();
        });
    }

    public  function blogs()
    {
        return $this->hasMany(Blogs::class);
    }
}
