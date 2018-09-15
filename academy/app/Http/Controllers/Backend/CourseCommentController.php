<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\CourseComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCommentRequest;
use App\Models\Student;

class CourseCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản Lý Bình Luận Khóa Học";
        $courseComment = CourseComment::orderBy('id','desc');
        if ($request->search) {
            $courseComment = $courseComment->where('name','like','%'.$request->search.'%');
        }
        $courseComment = $courseComment->paginate(10);
        return view('backend.course-comment.index', compact('title', 'courseComment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm Mới Bình Luận Khóa Học";
        return view('backend.course-comment.form',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCommentRequest $request)
    {
        $courseComment = CourseComment::create($request->all());
        return redirect('admin/course-comment')->with('status','Thêm mới bình luận thành công');
        
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CourseComment $courseComment)
    {
        $courseComment->delete();
        $request->session()->flash('status','Xóa bình luận thành công');
        return 1;
    }
}
