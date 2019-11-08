<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class NewMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'desc')
        ->limit(20) 
        ->paginate(5);

        return view('movies.index', compact('movies'));

        //return $movies;
    }   

    public function show($id)
    {
        $movie = Movie::findOrFail($id); // user will see 404 if the movie is not found

        //return $movie;

        return view('movies.show', compact('movie'));
    }
}
