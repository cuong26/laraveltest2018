<?php

namespace App\Http\Controllers;
use App\Theloai;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
class updatetlcontroller extends Controller
{
	 public function edit(Request $request) {

        
      $Theloai = Theloai::find($request->theloai_id);
      $Theloai->name = $request->tloai;
      $Theloai->save();
      	return redirect('/qltheloai');
	}
    public function index($id){

      $theloai = Theloai::find($id)->tintuc()->get();
 
      return view('updatetl',['theloai'=> $theloai]);
    }
}
