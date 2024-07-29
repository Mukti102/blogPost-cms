<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function blogs()
    {
        return $this->belongsToMany(Blogs::class, 'blog_tag');
    }
}
