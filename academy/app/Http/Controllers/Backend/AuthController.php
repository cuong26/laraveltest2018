<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function getLogin() {
    	if (Auth::check()) {
    		return redirect('admin');
    	}
    	return view('backend.layout.login');
    }

    public function postLogin(Request $request) {
    	if (Auth::attempt($request->only('email', 'password'), $request->remember ? true : false)) {            
    		return redirect('admin');
	    }       
	    return back()->with('status', 'Email hoặc mật khẩu không chính xác, xin vui lòng thử lại');
    }

    public function logout(Request $request) {
    	Auth::logout();
    	return redirect('admin/login');
    }
}
