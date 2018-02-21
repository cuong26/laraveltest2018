<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

use App\Http\Requests;

class StudDeleteController extends Controller {

   public function index(){

      $users = DB::table('student')->get();
       return view('stud_delete_view',['users'=>$users]);
        


   }

   public function destroy($id) {

     $users = User::destroy($id);

     return redirect('/chel');

   }

}

 