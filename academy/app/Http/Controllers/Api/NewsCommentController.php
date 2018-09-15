<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use App\Models\Student;
use Validator;

class NewsCommentController extends Controller
{
    // lấy list danh sách comment theo alias
    public function getList(Request $request){
        $newcomment = [];
        NewsComment::where(['status'=> 1,'parent_id' =>0])->WhereHas('news', function($q) use($request){
            $q->where('alias', $request->alias);
        })->orderBy('id','desc')->get()->map(function ($item) use (&$newcomment)
        {
            $newcomment[] = [
                'name'       =>$item->name,
                'email'      => $item->email,
                'content'    => $item->content,
                'new_id'     => $item->new_id,
                'status'     => $item->status,
                'created_at' => $item->created_at,
            ];
        });

        return response()->json([
                'status' => 'Thành Công',
                'code'   => 200,
                'data'   => $newcomment,
        ]);
    }

    public function checkComment(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'content' => 'required',
            'news_id' => 'required',
        ]);

        if($validator->fails()) {
            $error = $validator->errors();
            if ($error->has('email')) {
                return response()->json([
                    'status' => 'Chưa nhập email',
                    'code' => 500,
                ]);
            }
            if ($error->has('name')) {
                return response()->json([
                    'status' => 'Chưa nhập tên',
                    'code' => 500,
                ]);
            }
            if ($error->has('content')) {
                return response()->json([
                    'status' => 'Chưa nhập nội dung',
                    'code' => 500,
                ]);
            }
        };
        $comment = NewsComment::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'parent_id'  => $request->parent_id ?: 0,
                'news_id'    => $request->news_id ?: 0,
                'content'    => $request->content,
                'status'     => 0,
        ]);
        return response()->json([
                'status'     => 'Bình Luận Thành Công',
                'code'       => 200,
                'data'       => $comment,
        ]);
    }
}
