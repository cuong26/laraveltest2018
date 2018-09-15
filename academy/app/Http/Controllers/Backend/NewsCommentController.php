<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use App\Http\Requests\NewsCommentRequest;
use App\Models\News;

class NewsCommentController extends Controller
{   
    protected $module = 'Quản Lý Bình Luận';

    public function __construct() {
        view()->share([
            'page' => 'news-comment',
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
        $news_comment = NewsComment::orderBy('id','desc');
        if ($request->search) {
            $news_comment = $news_comment->where('name','like','%'.$request->search.'%');
        }
        $news_comment = $news_comment -> paginate(10);
        $title = $this->module;
        return view('backend.news-comment.index', compact('title', 'news_comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = 'Thêm Mới Bình Luận';
        return view('backend.news-comment.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCommentRequest $request)
    {   
        
        $news_comment = NewsComment::create($request->all());
        return redirect('admin/news-comment')->with('status','Thêm mới bình luận thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NewsComment $news_comment, Request $request)
    {   
        $title = "Chi Tiết Bình Luận";
        return view('backend.news-comment.view-detail', compact('title','news_comment'));
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
    public function destroy(NewsComment $news_comment, Request $request)
    {
        $news_comment->delete();
        $request->session()->flash('status', 'Xóa bình luận thành công!');
        return 1;
    }
}
