<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
class DtController extends Controller
{

  public function index(){
       $users = DB::table('tintuc')->get();

      /*return view('stud_edit_view',['users'=>$users]);*/
      return view('thu1',['users'=>$users]);


   }
     public function Delete($id)
    {
    	
    	Tintuc::find($id)->delete();
    	
    	return redirect('/pro');
    }
    
}
