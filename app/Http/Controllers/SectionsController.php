<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
   public function index()
   {

   	$sections = DB::table('sections')->get();
   	return view ('sections.index', compact('sections'));
   }

   public function filter()
   {
   	$students = DB::table('sections')
    		->join('students', 'sections.id', '=', 'students.section_id')
    		->join('payments', 'students.id', '=', 'payments.student_id')
            ->select('sections.*', 'students.*', 'payments.*')
    		->where('section_id', request()->section_id)
    		->get();
        //return result to axios 
    	return $students;
   }

}
