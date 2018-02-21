<?php

namespace App\Http\Controllers;
use App\Theloai;
use Illuminate\Http\Request;
use DB;
class thu1controller extends Controller
{
   public function show()
   {
   	$thu = DB::table('theloai')->get();
   	
   	return view('footer',compact('thu'));
   } 
}
