<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\HasLikes;

class Comments extends Model
{
    use HasFactory;
    use HasLikes;
   
    protected $fillable=['post_id','user_id','body','parent_id'];
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function child(){
        return $this->hasMany(Comments::class,'parent_id');
    }
    /* public function likes()
    {
        return $this->hasMany(CommentsLike::class,'comment_id');
    } */
}
