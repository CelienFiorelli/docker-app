<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{
    use HasFactory;

    public function scopeBaseQuery(Builder $query)
    {
        return $query->withCount(['likes', 'dislikes'])
            ->with([
                'likes' => function ($q) {
                    $q->where('user_id', Auth::user()->id);
                },
                'dislikes' => function ($q) {
                    $q->where('user_id', Auth::user()->id);
                }
            ]);
    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('is_like', true);
    }
    
    public function dislikes()
    {
        return $this->hasMany(Like::class)->where('is_like', false);
    }
}
