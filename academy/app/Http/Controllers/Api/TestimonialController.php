<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function getList(Request $request){
        $testimonial = [];
        Testimonial::orderBy('id','desc')->get()->map(function($item) use(&$testimonial){
            $testimonial[] = [
              'name'       => $item->name,
              'info'       => $item->info,
              'content'    => $item->content,
            ];
        });

        return response()->json([
           'status' => 'Thành Công',
           'code'   => 200,
           'data'   => $testimonial,
        ]);
    }
}
