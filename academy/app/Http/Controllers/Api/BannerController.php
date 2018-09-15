<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function getList(Request $request){
        $banner = [];
        Banner::orderBy('name','desc')->get()->map(function($item) use(&$banner){
            $banner [] = [
                'image'       => url('upload/banner',$item->image),
                'name'        => $item->name,
                'register'    => $item->register,
                'infomation'  => $item->infomation,
                'description' => $item->description,
            ];
        });
        return response()->json([
            'status' => 'Thành Công',
            'code'   => 200,
            'data'   => $banner,
        ]);
    }
}
