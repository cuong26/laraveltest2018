<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Theloai;

class deltlcontroller extends Controller
{
    public function destroy($id) {

     $theloai = Theloai::destroy($id);

     return redirect('/qltheloai');

   }

}
