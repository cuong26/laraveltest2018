<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function add (Request $request){
    	if (!$request->email) {
	   		return response()->json([
	   			'status' => 'Không có email nào',
	   			'code'	 => 500,
	   		]); 
	   	}
	   	$newsletter = Newsletter::where('email',$request->email)->first();
	   	if($newsletter){
	   		return response()->json([
	   			'status' => 'Email đã tồn tại trong hệ thống',
	   			'code'	 => 500,
	   		]); 
	   	}   
	   	$newsletter = Newsletter::create(['email' => $request->email]);
	   	return response()->json([
   			'status' => 'Thành công',
   			'code'	 => 200,
   			'data'	 => $newsletter,
   		]); 
    }
}
