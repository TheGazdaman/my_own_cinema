@extends('layout')

@section('content')
  <h1>Create a new review for {{ $movie->name }}</h1>


<form action="{{ action('ReviewController@store', $movie->id)}}" method="post">
  @csrf
          <div style="{{ $errors->has('value') ? 'background: red' : '' }}">
              <label for="value">Value</label>
              <input name="value" type="text">
              {{ $errors->first('value') }}
          </div>

          <div style="{{ $errors->has('text') ? 'background: red' : '' }}">
              <label for="text">Text</label>
              <textarea name="text">{{ old('text') }}</textarea> {{-- tímto uchováme vložený text v případě nějaké chyby --}}
              {{ $errors->first('text') }}
        </div>

          <button type="submit">Create</button>
  </form>

@endsection
