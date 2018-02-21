<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
class testcontroller extends Controller
{
      public function index(){

      // $users = DB::select('select * from student');
      $users = User::where('id' , '>' , 1)->get();
      // dd($users);
      /*return view('stud_edit_view',['users'=>$users]);*/
      return view('edit_user',['users'=>$users]);


   }

   public function show($id) {

      // $users = DB::select('select * from student where id = ?','>',2,[$id]);
      $users = User::where([
      	['id' , '=' , $id],
      	['id' , '>' , 2],
      ])->get();
      dd($users);

      return view('stud_update',['users'=>$users]);

   }

   public function edit(Request $request,$id) {

      	// $name = $request->input('name');
       // 	$email = $request->input('email');
    	$student = User::find($id);
    	$student->name = $request->stud_name;
    	$student->email = $request->stud_email;
    	$student->save();

      // DB::update('update student set name =? set email =? where id = ?',[$name,$email,$id]);
    	
      echo "Record updated successfully.<br/>";

      echo '<a href = “/edit-records”>Click Here</a> to go back.';

   }
   // public function shows(){
   //    $name =  DB::table('student')->get();
   //    // dd($name);
   //    return view('thu2',compact('name'));
   // }

}

