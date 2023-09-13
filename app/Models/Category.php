<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $fillable=['name','slug'];
    //relacion 1 a muchos
    public function posts(){
        return $this->HasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
