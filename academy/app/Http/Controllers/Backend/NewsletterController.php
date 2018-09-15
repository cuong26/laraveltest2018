<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Http\Requests\NewsletterRequest;

class NewsletterController extends Controller
{
    protected $module = 'Quản Lý Đăng Ký Nhận Bản Tin';

    public function __construct() {
        view()->share([
            'page' => 'newsletter',
            'module' => $this->module
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $newsletter = Newsletter::orderBy('id', 'desc');
        if ($request->search) {
            $newsletter = $newsletter->where('email', 'like', '%'.$request->search.'%');
        }
        $newsletter = $newsletter->paginate(20);
        $title = $this->module;
        return view('backend.newsletter.index', compact('title', 'newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm Mới Đăng Ký';
        return view('backend.newsletter.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterRequest $request)
    {
        $newsletter = Newsletter::create($request->all());
        return redirect('admin/newsletter')->with('status', 'Thêm mới đăng ký thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        $title = 'Sửa Đăng Ký';
        return view('backend.newsletter.form', compact('title', 'newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsletterRequest $request, Newsletter $newsletter)
    {
        $newsletter->update($request->all());
        return redirect('admin/newsletter')->with('status', 'Sửa đăng ký thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Newsletter $newsletter)
    {
        $newsletter->delete();
        $request->session()->flash('status', 'Xóa đăng ký thành công!');
        return 1;
    }
}
