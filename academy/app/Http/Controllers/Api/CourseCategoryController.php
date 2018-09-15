<?php

namespace App\Http\Controllers\Api;

use App\Models\CourseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseCategoryController extends Controller
{
    public function getList(Request $request)
    {
        $courseCategory = [];
        CourseCategory::orderBy('id', 'desc')->get()->map(function ($item) use (&$courseCategory) {
            $courseCategory[] = [
                'name'        => $item->name,
                'alias'       => $item->alias,
                'count'       => $item->course->count(),
            ];
        });
        return response()->json([
            'status' => 'Thành công',
            'code' => 200,
            'data' => $courseCategory,
        ]);
    }
}