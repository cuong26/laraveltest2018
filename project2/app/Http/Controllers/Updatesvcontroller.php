<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\infoUser;
use App\Http\Requests;


class Updatesvcontroller extends Controller
{
    public function Getsvbyid($id)
    {
    	$getinfo2 = infoUser::find($id);
    	return view('update', ['getinfo2' => $getinfo2]);
    }

    public function Update(Request $request,$id)
    {
    	$update          = infoUser::find($id);
    	$update->TEN     = $request ->fullname;
    	$update->TUOI    = $request ->tuoi;
    	$update->KHOAHOC = $request ->khoahoc;
    	$update->save();
    	return redirect('/sinhvien');
    }
}
