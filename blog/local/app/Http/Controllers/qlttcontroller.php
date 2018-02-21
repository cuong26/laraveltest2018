<?php

namespace App\Http\Controllers;
use App\Tintuc;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
class qlttcontroller extends Controller
{
    public function index(){
    	 $users = DB::table('tintuc')->get();
    	 

      /*return view('stud_edit_view',['users'=>$users]);*/
      return view('thu1',['users'=>$users]);


   }
    }


