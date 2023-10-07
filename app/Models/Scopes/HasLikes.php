<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CommentsLike;
use App\Models\User;

trait HasLikes
{
    /**
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(CommentsLike::class,'comment_id');
    }

    /**
     * @return false|int
     */
    public function isLiked(): bool|int
    {

        if (auth()->user()) {
            return User::with('likes')->whereHas('likes', function ($q) {
                $q->where('comment_id', $this->id);
            })->count();
        }

        return false;
    }
    public function isLikedbyme(): bool|int
    {

        if (auth()->user()) {
            return User::with('likes')->whereHas('likes', function ($q) {
                $q->where('comment_id', $this->id)->where('user_id',auth()->user()->id);
            })->count();
        }

        return false;
    }

    /**
     * @return bool
     */
    public function removeLike(): bool
    {
        if (auth()->user()) {
            return $this->likes()->where('user_id', auth()->user()->id)->where('comment_id', $this->id)->delete();
        }

        return false;
    }
}
