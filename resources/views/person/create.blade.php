@extends('layouts.app')

@section('content')

  <h1>Create a new person</h1>
<form method="POST" action="{{ action('NewPersonController@store') }}">
    @csrf 

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control"  plaxeholder="Name">
    </div>
    <div class="form-group">
      <label for="name">Photo</label>
      <input type="text" name="photo_url" class="form-control" id="photo" plaxeholder="Photo URL">
    </div>
    <div class="form-group">
      <label for="biography">Biography</label>
      <input type="text" name="biography" class="form-control" id="biography" plaxeholder="Biography">
    </div>
    <div class="form-group">
      <label for="profession">Profession</label>

      <select name="profession_id" id="profession">
        @foreach ($professions as $profession)
      <option value="{{ $profession->id }}">{{ $profession->name }}</option>
        @endforeach
      </select>

    
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection