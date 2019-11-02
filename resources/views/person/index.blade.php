@extends('layouts.app')

@section('content')
    <h1>Persons</h1>
      @foreach ($persons as $person)
        
          <div>
            <h2>
              <a href="{{ action('NewPersonController@show', $person->id ) }}">{{ $person->name }}
              </a>
              
            
          </div>
      
        @endforeach

        {{ $persons->links() }}  {{-- How to display pages --}}
        
@endsection 


