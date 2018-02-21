<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

class StudInsertController extends Controller

{

    

   

    function insert(Request $request){

        $name = $request->input('stud_name'); 
        $password = $request->input('password');
        $email = $request->input('email');


      DB::insert('insert into student(name ,password,email) values(?,?,?)',[$name ,$password,$email]) ;

        echo "Đã Thêm Thành Công !<br/>";

        echo '<a href="/blog/edit-records">Click Here </a> go to back.';

    }

}