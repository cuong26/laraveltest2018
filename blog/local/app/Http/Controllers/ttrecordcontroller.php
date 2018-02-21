<?php

namespace App\Http\Controllers;
use App\Tintuc;
use Illuminate\Http\Request;
use Validator;
class ttrecordcontroller extends Controller
{
    public function add( Request $request){
          

       $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.'
            ];
            
        $validator = Validator::make($request->all(), [
            'tieude'     => 'required|',
            'noidung'    => 'required|',
            'tomtat'    => 'required|'
           

        ],$messages);

        if ($validator->fails()) {
           return redirect('text')
                    ->withErrors($validator)
                    ->withInput();
                     
                }
      else{         
  
    	$tintuc = new Tintuc();
    	$tintuc->theloai_id = $request->theloai;
    	$tintuc->tieude = $request->tieude;
        $tintuc->tomtat = $request->tomtat;  
    	$tintuc->noidung = $request->noidung;
    	
     if(isset($request->Hinh)){
            $file = $request->Hinh;
            // dd($file);
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            // dd($Hinh);
            // dd(public_path().'\img');
            $file = $file->move('images' ,$Hinh);

            $tintuc->hinhanh = $Hinh;
    }else{
        $tintuc ->hinhanh = "" ;
    }

        $tintuc -> save();
       return redirect('/text');
    
    }
}
}
