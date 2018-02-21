<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use DB;
use bcrypt;
use App\User;

class Registercontroller extends Controller
{
    //
    public function showRegisterForm(){
        return view('fontend.register');
    }

    public function storeUser(Request $request){
        //dd($request->all());

        $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'email'    => 'Trường :attribute phải có định dạng email'
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
           

        ],$messages);

        if ($validator->fails()) {
           return redirect('dangky')
                    ->withErrors($validator)
                    ->withInput();
                     
                }
                     else {
                        
            $user = new User;            
            $user->name = $request ->name;
            $user->email = $request ->email;
            $user->password = bcrypt($request->password); 
            $user->save();
                   
           return view('dangnhap1');
        }
    }

}