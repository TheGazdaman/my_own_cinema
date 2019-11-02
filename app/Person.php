<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    public $timestamps = false;
    // fillable is a white list - only those are allowed
    protected $fillable = [
        'name',
        'photo_url',
        'biography',
        'profession_id'
    ];

    // black list of columns in case you know that everything has to be fillable, keep the array guarded empty.
    // protected $guarded = []; 
}
