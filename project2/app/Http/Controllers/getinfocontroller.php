<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\infoUser;

class getinfocontroller extends Controller
{
    public function getInfostudent()
    {
    	$getinfo= infoUser::all();

    	return view('sinhvien',['getinfo' => $getinfo]);
    }
}
