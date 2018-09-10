<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\infoUser;

class deletesvcontroller extends Controller
{
    public function deletesv($id)
    {
    	infoUser::find($id)->delete();
    	return redirect('/sinhvien');
    }
}
