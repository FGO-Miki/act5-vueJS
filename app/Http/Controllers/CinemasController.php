<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CinemasController extends Controller
{
   public function index()
   {

   	$cinemas = DB::table('cinemas')->get();
   	return view ('cinemas.index', compact('cinemas'));
   }

}
