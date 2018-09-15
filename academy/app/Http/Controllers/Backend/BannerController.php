<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use App\Helpers\FileUpload;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Quản Lý Banner';
        $banner = Banner::orderBy('id','desc');
        if($request->search){
            $banner = $banner->where('name', 'like','%'.$request->search.'%');
        };
        $banner = $banner->paginate(10);
        return view('backend.banner.index',compact('banner','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm Mới Banner";
        return view('backend.banner.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        if($request->hasFile('image_file')){
            $image = FileUpload::upload($request->file('image_file'),'banner');
            if($image){
                $request->merge(['image' => $image]);
            }
        }
        $banner = Banner::create($request->except('image_file'));
        return redirect('admin/banner')->with("status","Thêm Mới Thành Công");
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
    public function edit(Banner $banner)
    {
        $title = "Sửa Banner";
        return view('backend.banner.form',compact('title','banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        if($request->hasFile('image_file')){
            $image = FileUpload::upload($request->file('image_file'),'banner');
            if($image){
                $request->merge(['image' => $image]);
            }
        }
        $banner->update($request->except('image_file'));
        return redirect('admin/banner')->with('status','Sửa liên hệ thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        $banner->delete();
        $request->session()->flash('status','Xóa Banner Thành Công');
        return 1;
    }
}
