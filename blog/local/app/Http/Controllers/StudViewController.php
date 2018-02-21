<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;


use App\Http\Requests;

 class StudViewController extends Controller {

   public function index(){

      $users = User::find($id);

      /*return view('stud_edit_view',['users'=>$users]);*/
      return view('stud_view',['users'=>$users]);


   }

   public function show($id) {

      $users =  User::find($id);

      return view('stud_update',['users'=>$users]);

   }

   public function edit(Request $request,$id) {

      $name = $request->input('stud_name');

      DB::update('update student set name = ? where id = ?',[$name,$id]);

      echo "Record updated successfully.<br/>";

      echo '<a href = “/edit-records”>Click Here</a> to go back.';

   }

}