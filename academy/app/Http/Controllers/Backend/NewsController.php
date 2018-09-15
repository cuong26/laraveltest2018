<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Http\Requests\NewsRequest;
use App\Helpers\FileUpload;
use Auth;

class NewsController extends Controller
{   
    protected $module = 'Quản Lý Bài Viết';

    protected $list;

    public function __construct() {
        view()->share([
            'page' => 'news',
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
        $news = News::orderBy('id', 'desc');
        if ($request->search) {
            $news = $news->where('title','like','%'.$request->search.'%');
        }
        $news = $news->paginate(8);
        $title = $this->module;
        return view('backend.news.index', compact('title', 'news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Đăng Bài';
        $this->recursive(NewsCategory::all());
        $categories = $this->list;
        return view('backend.news.form', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if($request->hasFile('image_file')) {
            $image = FileUpload::upload($request->file('image_file'), 'news');
            if ($image) {
                $request->merge(['image' => $image]);
            }
        }
        if (!$request->alias) {
            $alias = str_slug($request->title);
            $newAlias = $alias;
            $count = 0;
            while (News::where('alias', $newAlias)->first()) {
                $count++;
                $newAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $newAlias]);
        }
        $request->merge(['user_id' => Auth::user()->id]);
        $news = News::create($request->except('image_file'));
        return redirect('admin/news')->with('status', 'Thêm mới nội dung thành công!');
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
    public function edit(News $news)
    {
        $title = 'Sửa Nội Dung';
        $this->recursive(NewsCategory::all(), $news->category_id);
        $categories = $this->list;
        return view('backend.news.form', compact('title', 'news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        if($request->hasFile('image_file')) {
            $image = FileUpload::upload($request->file('image_file'), 'news');
            if ($image) {
                $request->merge(['image' => $image]);
            }
        }
        if (!$request->alias) {
            $alias = str_slug($request->title);
            $newAlias = $alias;
            $count = 0;
            while (News::where('alias', $newAlias)->where('id', '<>', $news->id)->first()) {
                $count++;
                $newAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $newAlias]);
        }
        $news->update($request->except('image_file'));
        return redirect('admin/news')->with('status', 'Sửa nội dung thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsRequest $request, News $news)
    {
        $news->delete();
        $request->session()->flash('status', 'Xóa nội dung thành công!');
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
