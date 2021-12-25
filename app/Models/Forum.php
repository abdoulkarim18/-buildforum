<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function topics(){

        return $this->hasMany(Topic::class);
    }

    public function posts(){

        return $this->hasMany(Post::class);
    }

    public function discussions(){

        return $this->hasMany(Discussion::class);
    }
}
