<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\infoUser;

class postInfocontroller extends Controller
{
	public function addsv(Request $request)
	{
		$infoUser           = new infoUser();
		$infoUser->TEN      = $request->fullname;
		$infoUser->TUOI     = $request->tuoi;
		$infoUser->KHOAHOC  = $request->khoahoc;
		$infoUser->save();
		return redirect('/sinhvien');
	}
  
}
