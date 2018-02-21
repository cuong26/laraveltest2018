<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
use App\Theloai;
use DB;

use App\Http\Requests;

class baivietcontroller extends Controller
{
     public function show($id) {
      $users = Tintuc::find($id);
      
      
        $theloai = Tintuc::find($id)->theloai()->get();

         $tt = Theloai::all();
       
      

       
       
       

      
       
     
      return view('baiviet',['users'=>$users ,
                              'theloai'=>$theloai,
                            
                            'tt' =>$tt
                            
                          ]);
    }
    public function tet($id){
    	$theloai = Theloai::find($id)->tintuc()->get();
      // dd($id);
      $tintuc = Theloai::find($id);
      $list = Theloai::all();
      // dd($list);


      
    	return view('theloaitt',[
        'theloai' =>$theloai,
        'tintuc'=> $tintuc,
        'list' =>$list
      ]);
     
    	//echo $theloai->tomtat;
	/*foreach ($theloai as $t) {
		echo $t ->tieude;
		echo "<br>";
		echo $t ->tomtat;
		echo "<hr>";
	}
    }*/
    

}}
