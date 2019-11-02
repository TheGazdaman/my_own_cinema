@extends('layout')
 <style>
   .container {
     display: flex;
     justify-content: center;
     flex-wrap: wrap;
     width: 100vw;
     height: 100vh;
   }

   .movie {
 
    margin: 20px;
    -webkit-box-shadow: 11px 9px 47px -13px rgba(0,0,0,0.75);
    -moz-box-shadow: 11px 9px 47px -13px rgba(0,0,0,0.75);
    box-shadow: 11px 9px 47px -13px rgba(0,0,0,0.75);
   }
   img {
     width: 300px;
     height: 500px;
   }
  .heading {
    
    width: 300px;
    height: 80px;
  }
  </style>

@section('content')

<h1>Movies</h1>
<div class="container">

  @foreach ($movies as $movie)
  <div class="movie"> 
    <div class="heading">
        <h2>{{ $movie->name }}</h2>
        <h3>{{ $movie->year }}</h3>
    </div>
    <img src="{{ $movie->poster_url }}">
    <p>Rating: {{ $movie->rating }}</p>
    @can('create_review', $movie)
    <a href="{{ action('NewMovieController@show', $movie->id)}}">Open detail</a>
    @endcan
    
  </div>
@endforeach

</div>

@endsection