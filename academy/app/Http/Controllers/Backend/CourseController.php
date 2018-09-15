<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Lesson;
use App\Http\Requests\CourseRequest;
use App\Helpers\FileUpload;

class CourseController extends Controller
{   
    protected $module = 'Danh Sách Khóa Học';

    protected $list;

    public function __construct() {
        view()->share([
            'page' => 'course',
            'module' => $this->module,
            'level' => ['Tất cả các cấp học', 'Sau đại học', 'Đại học', 'Cao đẳng', 'THPT'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $course = Course::orderBy('id','desc');
        if ($request->search) {
            $course = $course->where('name','like','%'.$request->search.'%');
        }
        $course = $course->paginate(20);
        $title = $this->module;
        return view('backend.course.index', compact('title','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $this->recursive(CourseCategory::all());
        $categories = $this->list;

        $teacher = Teacher::all()->pluck('name', 'id');

        $title = "Thêm Mới Khóa Học";
        return view('backend.course.form', compact('title','categories','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image_file')){
            $image = FileUpload::upload($request->file('image_file'),'course');
            if($image){
                $request->merge(['image' => $image]);
            }
        }
        if (!$request->alias) {
            $alias = str_slug($request->name);
            $courseAlias = $alias;
            $count = 0;
            while (Course::where('alias', $courseAlias)->first()) {
                $count++;
                $courseAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $courseAlias]);
        }
        $course = Course::create($request->except('image_file', 'section_name', 'section_number', 'lesson_name', 'lesson_time', 'lesson_number'));
        if ($request->section_name) {
            $count = 0;
            foreach ($request->section_name as $k => $s) {
                $section = Section::create([
                    'name' => $s,
                    'course_id' => $course->id,
                    'number' => $request->section_number[$k],
                ]);
                if (isset($request->lesson_name[$k]) && count($request->lesson_name[$k])) {
                    foreach($request->lesson_name[$k] as $sk => $ln) {
                        Lesson::create([
                            'name' => $ln,
                            'section_id' => $section->id,
                            'number' => $request->lesson_number[$k][$sk],
                            'time' => $request->lesson_time[$k][$sk],
                        ]);
                    }
                }
            }
        }
        return redirect('admin/course')->with('status','Thêm mới khóa học thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, CourseRequest $request)
    {
        $title = 'Sửa Khóa Học';

        $this->recursive(CourseCategory::all(), $course->category_id);
        $categories = $this->list;

        $teacher = Teacher::all()->pluck('name', 'id');

        $html = '';
        if ($course->section->count()) {
            $course->section->map(function($item) use (&$html) {
                $html .= view('backend.template.section', ['count' => $item->number, 'section' => $item])->render();
            });
        }

        return view('backend.course.form', compact('title', 'course', 'categories','teacher', 'html'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Course $course, CourseRequest $request)
    {
        if($request->hasFile('image_file')) {
            $image = FileUpload::upload($request->file('image_file'), 'course');
            if ($image) {
                $request->merge(['image' => $image]);
            }
        }
        if (!$request->alias) {
            $alias = str_slug($request->name);
            $courseAlias = $alias;
            $count = 0;
            while (Course::where('alias', $courseAlias)->where('id', '<>', $course->id)->first()) {
                $count++;
                $courseAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $courseAlias]);
        }
        $course->update($request->except('image_file', 'section_name', 'section_number', 'lesson_name', 'lesson_time', 'lesson_number'));

        $course->lesson()->delete();
        $course->section()->delete();
        if ($request->section_name) {
            $count = 0;
            foreach ($request->section_name as $k => $s) {
                $section = Section::create([
                    'name' => $s,
                    'course_id' => $course->id,
                    'number' => $request->section_number[$k],
                ]);
                if (isset($request->lesson_name[$k]) && count($request->lesson_name[$k])) {
                    foreach($request->lesson_name[$k] as $sk => $ln) {
                        Lesson::create([
                            'name' => $ln,
                            'section_id' => $section->id,
                            'number' => $request->lesson_number[$k][$sk],
                            'time' => $request->lesson_time[$k][$sk],
                        ]);
                    }
                }
            }
        }
        return redirect('admin/course')->with('status', 'Sửa khóa học thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, CourseRequest $request)
    {
        $course->delete();
        $request->session()->flash('status', 'Xóa khóa học thành công!');
        return 1;
    }

    public function recursive($data = array(), $current = 0, $parent = 0, $string = "") {
        foreach ($data as $val) {
            if ($val->parent_id == $parent) {
                $this->list .= "<option value=" . $val->id;
                if ($val->id == $current) {
                    $this->list .= " selected";
                }
                $this->list .= ">" . $string . $val->name . "</option>";
                $this->recursive($data, $current, $val->id, $string . "|--");
            }
        }
    }
}
