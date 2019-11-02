@extends('layout')


@section('content')

<h1>Review of {{ $movie->name}}</h1>

@if($reviews->count() == 0)
    <p>No reviews yet!</p>
@else 
    @foreach ($reviews as $review)

        <div class="movie" value=""> 
        <p>{{ $review->id }}</p>
        
        <h3>{{ $review->text }}</h3>
        @if($review->user)
        <p>Made with love by {{ $review->user->name }}</p> 
        @endif 
        </div>
    
    @endforeach
@endif

<p>Rating: {{ $movie->rating }}</p>

@if(auth()->check() && \Gate::allows('create_review', $movie)) {{-- (auth()->id() != null) --}}
    <a href="{{ action('ReviewController@create', $movie->id)}}">Write a review</a>
@endif

    <a href="{{ action('NewMovieController@index')}}">Back to movies</a>
    <a href="{{ action('NewMovieController@show', $movie->id)}}"><- back</a>

@endsection