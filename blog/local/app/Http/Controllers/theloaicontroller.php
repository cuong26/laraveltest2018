<?php

namespace App\Http\Controllers;
use App\Theloai;
use Illuminate\Http\Request;
use DB;

class theloaicontroller extends Controller
{
    public function add(Request $request){
    	$bien = DB::table('theloai')->where('name' ,  $request ->name)->first();
        // $bienc = $request ->name;
        if (isset($bien) && count($bien)) {

            echo "Thể loại đã tồn tại";
        } 
        else {
            $theloai = New Theloai();
        $theloai ->name = $request ->name;
        $theloai ->save()   ;
        return redirect('/qltheloai');
    
        }
        
     

       

    }
    public function show(){

    	$theloai = Theloai::all();
    	return view('theloai',['theloai'=> $theloai]);
    }
   
}
