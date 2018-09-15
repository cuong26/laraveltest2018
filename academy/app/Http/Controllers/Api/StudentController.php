<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'birthday'   => 'required',
//            'gender'     => 'required',
            'address'    => 'required',
            'phone'      => 'required',
            'email'      => 'required',
            'note'       => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            if ($error->has('name')) {
                return response()->json([
                    'status' => 'Chưa nhập name',
                    'code' => 500,
                ]);
            }

            if ($error->has('email')) {
                return response()->json([
                    'status' => 'Chưa nhập email',
                    'code' => 500,
                ]);
            }

            if ($error->has('birthday')) {
                return response()->json([
                    'status' => 'Chưa nhập ngày sinh',
                    'code' => 500,
                ]);
            }

            if ($error->has('gender')) {
                return response()->json([
                    'status' => 'Chưa nhập giới tính',
                    'code' => 500,
                ]);
            }

            if ($error->has('address')) {
                return response()->json([
                    'status' => 'Chưa nhập địa chỉ',
                    'code' => 500,
                ]);
            }

            if ($error->has('phone')) {
                return response()->json([
                    'status' => 'Chưa nhập số điện thoại',
                    'code' => 500,
                ]);
            }

            if ($error->has('note')) {
                return response()->json([
                    'status' => 'Chưa nhập số ghi chú',
                    'code' => 500,
                ]);
            }
        }
        $student = Student::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'birthday'  =>$request->birthday,
//            'gender'    =>$request->gender,
            'address'   =>$request->address,
            'phone'     =>$request->phone,
            'note'      =>$request->note,
        ]);
        return response()->json([
            'status' => 'Thành Công',
            'code'   => 200,
            'data'   => $student,
        ]);
    }
}
