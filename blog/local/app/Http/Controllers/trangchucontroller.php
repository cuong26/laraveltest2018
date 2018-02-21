<?php

namespace App\Http\Controllers;
use App\Tintuc;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
class trangchucontroller extends Controller
{
    public function show(){
    	$tintuc = Tintuc::paginate(6);
        $tin = DB::table('theloai')->get();
    	
    	return view('trangchu',['tintuc' => $tintuc],['tin' => $tin]);
    }
    /*public function edit(){
    	$tintuc = DB::table('tintuc')->groupBy('theloai')->select('theloai', DB::raw('count(*) as total'))->get();
    	return view('trangchu',['tin' =>$tin]);
    	
    }*/
}
