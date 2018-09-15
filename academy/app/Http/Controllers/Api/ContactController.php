<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function postAdd(Request $request){
    	if (!$request->name) {
    		return response()->json([
	            'status'  => 'Không thành công',
	            'code'    => 500,
	            'message' => 'Chưa nhập tên'
	        ]);
    	}
    	if (!$request->email) {
    	    return response()->json([
    	        'status'  => 'Không thành công',
                'code'    => 500,
                'message' => 'Chưa nhập email'
            ]);
        }
        $contact = Contact::create($request->all());
        return response()->json([
            'status' => 'Thành công',
            'code'   => 200,
            'data'   => $contact
        ]);
    }
}
