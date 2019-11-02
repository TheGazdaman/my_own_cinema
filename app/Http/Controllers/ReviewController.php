<?php

namespace App\Http\Controllers;
use App\Http\Requests\ReviewRequest;

use App\Review;
use App\Movie;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movie)
    {
       // $reviews = Review::where('movie_id', $movie)->get(); // in this way we select only reviews of particular movie
       if(\Gate::denies('admin')) {
        return 'you are not an administrator';
    }  
    
       if(\Gate::allows('admin')) {
  
        $movie = Movie::findOrFail($movie);
        $reviews = $movie->reviews()->get();


       return view('movies.Reviews.index', compact('reviews', 'movie'));
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($movie)
    {
        $movie = Movie::findOrFail($movie);
       
        return view('movies.Reviews.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($movie, ReviewRequest $request)    // we want validate Review request
    {
        // here comes validation logic

       /*  $this->validate($request, [
            'value' => 'required|numeric|min:0|max:10',   // displays message if incorrect input
            'text' => 'required|min:10|max:160'             // displays message if incorrect input
        ], [
            'value.required' => 'Oh come on! You need to provide rating!',
            'text.required' => 'asdfsdgre',
            'value.numeric' => 'You stupid! Don\'t you know rating must be a number?!'
        ]); */

        $review             = new Review();
        $review->user_id    = auth()->id();   //rand(1, 10000); // every user can do just one review. 
        $review->movie_id   = $movie;
        $review->text       = $request->input('text');
        $review->rating     = $request->input('value');

        $review->save();


        return redirect(action('ReviewController@index', $movie));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
