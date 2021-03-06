<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Collection;
use App\User;

class CollectionController extends Controller
{
    
    public function store() 
    {
    $collection = new Collection;
    $collection->name = 'Top history movies';
    $collection->description = "He who forgets his own history is destined to repeat it.";
    // associate the collection with the user 1
    $collection->user()->associate(1);
    // associate the collection with the genre 9 (history)
    $collection->genre()->associate(9);
    $collection->save();
    
    // attach 5 movies to the collection, giving appropriate priorities
    $collection->movies()->attach([
        624 => ['priority' => 5], 
        780 => ['priority' => 4], 
        460 => ['priority' => 3], 
        213 => ['priority' => 2], 
        316 => ['priority' => 1]
    
    // nebo: $collection->movies()->attach([624, 780, 460, 213, 316]);

        ]);
    }
    public function user_lists() 
    {
        $user = User::find(1);

        return $user->collections;
    }
}
