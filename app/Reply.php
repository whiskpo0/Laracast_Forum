<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite($user_id)
    {
        $attributes = ['user_id' => auth()->id()];
        
        if (! $this->favorite()->where($attributes)->exsits()) {
            return $this->favorites()->create($attributes);
        }
    }
}
