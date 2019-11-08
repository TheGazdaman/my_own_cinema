<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Mail;

class CoolApiController extends Controller
{
  public function index() {

    $movies = Movie::with('genre')->limit(10)->get();
    
    return $movies;
  }
}