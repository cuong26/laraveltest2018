<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
use DB;
use App\Theloai;

class dltttController extends Controller
{

	public function show($id) {

   $users = DB::table('tintuc')->get();


      return view('update',['users'=>$users]);

   }
    public function Update(Request $request,$id)
    {
    	
    	$student = Tintuc::find($id);
      $student->tieude = $request->tieude;
      $student->noidung = $request->noidung;
      $student->save();
    	
  	echo "Update thành công";
    
    }
    public function cat($id){
      $theloai = Theloai::find($id);
      
     
      return view('checkout',['theloai'=>$theloai]);
    }
}
