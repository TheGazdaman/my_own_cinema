<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');    // $this(movie) has many reviews
    }

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function favored_by_users()
    {
        return $this->belongsToMany('App\User','favorite_movies');
    }

    public function genre()
    {
        return $this->belongsToMany('App\Genre');
    }
}
