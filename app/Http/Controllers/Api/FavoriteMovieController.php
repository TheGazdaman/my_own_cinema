<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FavoriteMovie;

class FavoriteMovieController extends Controller
{   
    public function toggle(Request $request)
    {
        $user_id = $request->input('user_id'); // ukládám si z proměnné $request informace vložené do inputu 'user_id'
        $movie_id = $request->input('movie_id');

        $favorite_movie = FavoriteMovie::where('user_id', $user_id)->where('movie_id', $movie_id)->first(); // první hodnota - kam se to má podívat, druhá hodnota - co tam má hledat.

        if($favorite_movie === null) {
            $favorite_movie = new FavoriteMovie;
            $favorite_movie->user_id = $user_id; 
            $favorite_movie->movie_id = $movie_id; 
            $favorite_movie->save();

            return [
                'status' => 'success',
                'message' => 'Movie was added to favorites',
                'data' => [
                    'favorite' => true
                ]
            ];
        } 
        else {
            $favorite_movie->delete();

            return [
                'status' => 'success',
                'message' => 'Movie was removed from favorites',
                'data' => [
                    'favorite' => false
                ]
            ];
        }
    }

    public function status(Request $request)
    {
        $user_id = $request ->input('user_id');
        $movie_id = $request->input('movie_id');
        $favorite_movie = FavoriteMovie::where('user_id', $user_id)              ->where('movie_id', $movie_id)
                    ->first();

        // if favorite
        if($favorite_movie === null) {
            
                return [
                    'favorite' => false
            ];
        }
        // if not favorite
        else if ($favorite_movie !== null) {
            
                return [
                    'favorite' => true
            ];
        }
    }
}
