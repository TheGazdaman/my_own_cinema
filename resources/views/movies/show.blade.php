@extends('layout')

<style>
 img {
     width: 300px;
     height: 500px;
   }

</style>


@section('content')

<div class="movie"> 
<h2>{{ $movie->name }}</h2>
<h3>{{ $movie->year }}</h3>
<img src="{{ $movie->poster_url }}">
<p>Rating: {{ $movie->rating }}</p>
</div>
<a href="{{ action('ReviewController@index', $movie->id)}}">See the reviews</a> 
<a href="{{ action('NewMovieController@index')}}">Back to movies</a>



@endsection