<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth; 

class logincontroller extends Controller
{
    public function login(Request $request )
    {
    	$username = $request['username'];
    	$password= $request['password'];
    	
    	if (Auth::attempt(['username'=>$username, 'password' =>$password]))
    	{ 
    		return view('stud_edit_view',['user'=>Auth::user()]);
    	}
    	else
    	{
    		/*echo $request['username']."<br>";
    		echo $request['password'];*/
    		return view('dangnhap',['fls'=>'Đăng Nhập Thất Bại! Mời Đăng Nhập Lại']);
    	}
    		
    	
    }

    public function logout()
    {
         Auth::logout();
 return view('dangnhap');
    }
