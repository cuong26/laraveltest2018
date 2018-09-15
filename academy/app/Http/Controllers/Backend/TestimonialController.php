<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title   = " Quản Lý Nhận Xét Học Viên";
        $testimonial = Testimonial::orderBy('id','desc');
        if (@$request->search){
            $testimonial = Testimonial::where('name','like','%'.$request->search.'%');
        }
        $testimonial = $testimonial->paginate(10);
        return view('backend.testimonial.index',compact('title','contact', 'testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm Mới Nhận Xét Học Viên";
        return view('backend.testimonial.form',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = Testimonial::create($request->all());
        return redirect('admin/testimonial')->with("status","Thêm mới thành công");
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
    public function edit(Testimonial $testimonial)
    {
        $title = "Sửa Liên Hệ";
        return view('backend.testimonial.form',compact('title','testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request,Testimonial $testimonial)
    {
        $testimonial->update($request->all());
        return redirect('admin/testimonial')->with('status',"Sửa nhận xét thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Testimonial $testimonial)
    {
        $testimonial->delete();
        $request->session()->flash('status','Xóa nhận xét thành công');
        return 1;
    }
}
