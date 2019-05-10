<?php

namespace App;

trait Favoritable
{
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    public function isFavorited()
    {
        return !! $this->favorites->where('user_id', auth()->id())->count();
        // return !! $value 는 return (bool) $value와 같은 의미. 즉 count 결과가 1이상이면 TRUE, 아니면 FALSE를 반환한다.
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}