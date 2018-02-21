<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Tintuc;
use Validator;
use App\Http\Requests;

class updatecontroller extends Controller
{
    public function show($id) {
      $users = Tintuc::find($id);
      return view('update',['users'=>$users]);
    }
   
    public function Update(Request $request,$id)
    {
       $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.'
            ];
            
        $validator = Validator::make($request->all(), [
            'tieude'     => 'required|',
            'noidung'    => 'required|',
            'tomtat'    => 'required|'
            
           

        ],$messages);

        if ($validator->fails()) {
           return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
                     
                }
        else{      
        
        $students = Tintuc::find($id);
      $students->tieude = $request->tieude;
      $students->noidung = $request->noidung;
       $students->tomtat = $request->tomtat;
      $students->save();
        
    return redirect('/pro');
    }
    }
}
