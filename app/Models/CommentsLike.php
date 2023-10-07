<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsLike extends Model
{
    use HasFactory;
    protected $table = 'comments_likes';
    protected $fillable = [
        'user_id',
        'comment_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
