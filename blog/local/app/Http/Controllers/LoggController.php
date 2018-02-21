<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests;


class LoggController extends Controller
{
    public function login(Request $request )
    {
    	$username = $request['username'];
    	$password= $request['password'];
    	
    	if (Auth::attempt(['username'=>$username, 'password' =>$password]))
    	{ 
    		return view('check');
    	}
    	else
    	{
    		/*echo $request['username']."<br>";
    		echo $request['password'];*/
    		return view('dangnhap');
    	}
    		
    	
    }

   
}



