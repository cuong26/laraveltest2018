<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;

use App\Http\Requests;

 class StudUpdateController extends Controller {
public function show($id) {

      $users = DB::table('student')->get();

      return view('stud_update',['users'=>$users]);

   }
  

   public function edit(Request $request,$id) {

         // $name = $request->input('name');
       //   $email = $request->input('email');
      $student = User::find($id);
      $student->name = $request->stud_name;
      $student->email = $request->stud_email;
      $student->save();

      // DB::update('update student set name =? set email =? where id = ?',[$name,$email,$id]);
      
      echo "Record updated successfully.<br/>";

     return redirect('/chel');

   }
      

}