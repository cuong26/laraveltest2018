<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function getList (Request $request) {    
        $teacher = [];
        Teacher::orderBy('id','desc')->get()->map(function($item) use (&$teacher) {
            $teacher[] = [
                'image' => url('upload/teacher/'.$item->image),
                'name'  => $item->name,
                'facebook'  => $item->facebook,
                'twitter'   => $item->twitter,
                'youtube'   => $item->youtube,
                'linkedin'  => $item->linkedin,
                'position'  => $item->position,
                'phone'     => $item->phone,
                'email'     => $item->email,
                'skype'     => $item->skype,
                'information' => $item->information,
            ];
        });
        return response()->json([
            'status' => 'Thành công',
            'code'   => 200,
            'data'   => $teacher,
        ]);
    }
}
