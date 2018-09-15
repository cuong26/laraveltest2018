<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Carbon\Carbon;

class CourseController extends Controller
{
    protected $id = [];

    public function getFeatureCourse (Request $request) {

    	$course = [];
    	Course::where('feature','1')->get()->map(function($item) use (&$course) {
            $start = Carbon::createFromFormat('d/m/Y', $item->course_start);
            $end = Carbon::createFromFormat('d/m/Y', $item->course_end);
    		$course[] = [
    			'image'         => url('upload/course/'. $item->image),
    			'name' 	        => $item->name,
    			'teacher'       => $item->teacher->name,
    			'price'         => number_format($item->price),
                'alias'         => $item->alias,
                'description'   => $item->description,
                'durations'     => $end->diffInMonths($start),
                'level'         => $item->level,
                'class_start'   => $item->class_start,
                'class_end'     => $item->class_end,
                'size'          => $item->size,
                'information'   => $item->information,
                'course_start'  => $item->course_start,
                'course_end'    => $item->course_end,
    		];
    	});
    	return response()->json([
    		'status' 	=> 'Thành công',
    		'code'		=> 200,
    		'data' 		=> $course,
     	]);
    }

    public function getListCourse (Request $request) {
        $course = [];
        if ($request->sort) {
            $model = Course::orderBy('course_start', $request->sort);
        } else {
            $model = Course::orderBy('id', 'desc');
        }
        if ($request->category) {
            $model = $model->where('category_id', $request->category);
        }
        $model->paginate(6)->map(function($item) use (&$course) {
            $start = Carbon::createFromFormat('d/m/Y', $item->course_start);
            $end = Carbon::createFromFormat('d/m/Y', $item->course_end);
            $course[] = [
                'name'              => $item->name,
                'category_id'       => $item->courseCategory->name,
                'image'             => url('upload/course/'.$item->image),
                'teacher'           => $item->teacher->name,
                'image_teacher'     => url('upload/teacher/'.$item->teacher->image),
                'description'       => $item->description,
                'size'              => $item->size,
                'price'             => number_format($item->price),
                'durations'         => $end->diffInMonths($start),
                'class_duration'    => $item->class_start.' - '.$item->class_end,
                'alias'             => $item->alias,
            ];
        });
        return response()->json([
            'status'    => 'Thành công',
            'code'      => 200,
            'data'      => $course,
        ]);
    }

    public function getDetail (Request $request){
        if (!$request->alias) {
            return response()->json([
                'status' => 'Chưa cung cấp alias',
                'code'   => 400,
            ]);
        }
        $course = Course::with('teacher')->where('alias',$request->alias)->first();

        if(!$course){
            return response()->json([
                'status' => 'không tìm thấy khóa học có alias tương ứng',
                'code'   => 400,
            ]);
        }
        $start = Carbon::createFromFormat('d/m/Y', $course->course_start);
        $end   = Carbon::createFromFormat('d/m/Y', $course->course_end);
        $course->lecturer        = $course->teacher;
        $course->teacher_name    = $course->teacher->name;
        $course->category_name   = $course->courseCategory->name;
        $course->image           = url('upload/course/'.$course->image);
        $course->teacher_image   = url('upload/teacher/'.$course->teacher->image);
        $course->start_course    = Carbon::createFromFormat('d/m/Y', $course->course_start)->format('M d, Y');
        $course->durations       = $end->diffInMonths($start).' Months';
        $course->class_duration  = $course->class_start.' - '.$course->class_end;
        $course->seats_available = $course->size;
        $course->course_price    = number_format($course->price);
        if($course->section) {
            foreach($course->section as $s) {
                $s->lesson;
            }
        }

        unset($course->course_start,$course->teacher_id,$course->category_id,$course->course_end,$course->class_start,$course->class_end,$course->size,$course->price,$course->school_day,$course->meta_title,$course->meta_description, $course->teacher,$course->courseCategory);
        
        return response()->json([
            'status'   => 'Thành công',
            'code'     => 200,
            'data'     => $course
        ]);
    }
    public function getBanner()
    {
        $course = [];
        Course::orderBy('id','desc')->get()->map(function($item) use (&$course) {
            $course[] = [
                'image' => url('upload/course/'.$item->image),
                'name'  => $item->name,
            ];
        });
        return response()->json([
            'status' => 'Thành công',
            'code'   => 200,
            'data'   => $course,
        ]);
    }

    // lấy link danh sách khóa học theo alias
    public function getLinkCourse()
    {
        $course = [];
        Course::orderBy('id','desc')->get()->map(function($item) use(&$course){
            $course [] = [
            'name'  => $item->name,
            'alias' => $item->alias,
            ];
        });
        return response()->json([
           'status' => 'Thành Công',
           'code'   => 200,
           'data'   => $course,
        ]);
    }
    public function getLastestCourse()
    {
        $course = [];
        Course::orderBy('created_at','desc')->get()->map(function($item) use (&$course){
            $course []  = [
                'name'  => $item->name,
                'image' => url('upload/course/'.$item->image),
                'alias' => $item->alias,
            ];
         });
        return response()->json([
           'status' => 'Thành Công',
           'code'   => 200,
           'data'   => $course,
        ]);

    }

    public function getListFilterCourse(Request $request)
    {
        $course = [];
        $category = CourseCategory::where('alias',$request->alias)->first();
        if($category) {
            $this->id[] = $category->id;
            $this->childList($category);
        }
        Course::whereIn('category_id', $this->id)->orderBy('created_at','desc')->paginate(6)->map(function ($item) use(&$course){
            $start = Carbon::createFromFormat('d/m/Y', $item->course_start);
            $end = Carbon::createFromFormat('d/m/Y', $item->course_end);
            $course []= [
                'image'         => url('upload/course/'. $item->image),
                'image_teacher' => url('upload/teacher/'.$item->teacher->image),
                'name' 	        => $item->name,
                'teacher'       => $item->teacher->name,
                'price'         => number_format($item->price),
                'alias'         => $item->alias,
                'description'   => $item->description,
                'durations'     => $end->diffInMonths($start),
                'level'         => $item->level,
                'class_start'   => $item->class_start,
                'class_end'     => $item->class_end,
                'size'          => $item->size,
                'meta_title'    => $item->meta_title,
                'information'   => $item->information,
                'course_start'  => $item->course_start,
                'course_end'    => $item->course_end,
            ];
        });
            return response()->json([
            'status' => 'Thành Công',
            'code'   => 200,
            'data'   => $course,
        ]);

    }

    public function childList($data) {
        if($data->child) {
            foreach($data->child as $c) {
                $this->id[] = $c->id;
                $this->childList($c);
            }
        }
    }
}
