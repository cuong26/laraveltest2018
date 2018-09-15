<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseComment;
use App\Models\Student;
use Validator;

class CourseCommentController extends Controller
{
    public function getList(Request $request)
    {

        $courseComment = [];
        CourseComment::where(['status' => 1, 'parent_id' => 0])->whereHas('course', function($q) use ($request) {
            $q->where('alias', $request->alias);
        })->orderBy('id', 'desc')->get()->map(function ($item) use (&$courseComment) {
            $courseComment[] = [
                'name'       => $item->name,
                'email'      => $item->email,
                'content'    => $item->content,
                'status'     => $item->status,
                'created_at' => $item->created_at,
            ];
        });
        return response()->json([
            'status' => 'thành công',
            'code'   => 200,
            'data'   => $courseComment,
        ]);
    }

    public function checkComment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
            'course_id' => 'required',
            'parent_id' => 'required',

        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            if($error->has('email')){
                return response()->json([
                    'status' => 'Chưa Nhập Email',
                    'code'   => 500,
                ]);
            }

            if($error->has('name')){
                return response()->json([
                    'status' => 'Chưa Nhập Tên',
                    'code'   => 500,
                ]);
            }

            if($error->has('content')){
                return response()->json([
                    'status' => 'Chưa Nhập Nội Dung',
                    'code'   => 500,
                ]);
            }
        };


        $name       = isset($student) ? $student->name : $request->name;
        $email      = isset($student) ? $student->email : $request->email;
        $comment    = CourseComment::create([
            'parent_id'  => $request->parent_id,
            'course_id'  => $request->course_id,
            'email'      => $email,
            'name'       => $name,
            'content'    => $request->content,
            'status'     => 0,
            ]);
        return response()->json([
            'status' => 'Bình Luận Thành Công',
            'code'   => 200,
            'data'   => $comment,
        ]);
    }

}
