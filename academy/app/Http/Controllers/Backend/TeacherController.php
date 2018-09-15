<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use App\Helpers\FileUpload;

class TeacherController extends Controller
{   
    protected $module   = 'Giảng Viên';

    protected $position = [
        'Wordpress', 'Ruby', 'PHP'
    ];

    public function __construct() {
        view()->share([
            'page'      => 'teacher',
            'module'    => $this->module,
            'position'  => $this->position,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teacher = Teacher::orderBy('id', 'desc');
        if ($request->search) {
            $teacher = $teacher->where('name','like','%'.$request->search.'%');
        }
        $teacher = $teacher->paginate(20);
        $title   = $this->module;
        return view('backend.teacher.index', compact('title', 'teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm Mới Giảng Viên';
        return view('backend.teacher.form',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {   
        if($request->hasFile('image_file')){
            $image = FileUpload::upload($request->file('image_file'),'teacher');
            if($image){
                $request->merge(['image' => $image]);
            }
        }
        $teacher = Teacher::create($request->except('image_file'));
        return redirect('admin/teacher')->with('status','Thêm mới giảng viên thành công!');
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
    public function edit(Teacher $teacher)
    {
        $title = "Sửa Giảng Viên";
        return view('backend.teacher.form', compact('title','teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher, TeacherRequest $request)
    {
        if($request->hasFile('image_file')) {
            $image = FileUpload::upload($request->file('image_file'), 'teacher');
            if ($image) {
                $request->merge(['image' => $image]);
            }
        }
        $teacher->update($request->except('image_file'));
        return redirect('admin/teacher')->with('status', 'Sửa giảng viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Teacher $teacher, Request $request)
    {
        $count = $teacher->course->count();
        if (!$count) {
            $teacher->delete();
            $request->session()->flash('status', 'Xóa giảng viên thành công!');
            return 1;
        }
    }
}
