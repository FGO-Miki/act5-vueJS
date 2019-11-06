<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
	public function index(){

	if (Request()->has('cinema_id')) {
		return DB::table('movies')->where('cinema_id', Request()-> cinema_id)->get();
	}
		$movies = DB::table('movies')->get();
		return $movies;
	}
    
}
