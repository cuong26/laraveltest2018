<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Http\Requests\NewsCategoryRequest;

class NewsCategoryController extends Controller
{   
    protected $module = 'Danh Mục Tin Tức';

    protected $list;

    public function __construct() {
        view()->share([
            'page'      => 'news-category',
            'module'    => $this->module
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $news_category = NewsCategory::orderBy('id', 'desc');
        if ($request->search) {
            $news_category = $news_category->where('name','like', '%'.$request->search.'%');
        }
        $news_category = $news_category->paginate(20);
        $title = $this->module;
        $this->recursive(NewsCategory::all());
        $categories = $this->list;
        $nestable = view('backend.news-category._nestable', ['data' => NewsCategory::where('parent_id', 0)->orderBy('position', 'asc')->get()])->render();
        return view('backend.news-category.index', compact('title', 'nestable', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm Danh Mục';
        $this->recursive(NewsCategory::all());
        $categories = $this->list;
        return view('backend.news-category.form', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCategoryRequest $request)
    {
        if (!$request->parent_id) {
            $request->merge(['parent_id' => 0]);
        }
        if (!$request->alias) {
            $alias = str_slug($request->name);
            $newAlias = $alias;
            $count = 0;
            while (NewsCategory::where('alias', $newAlias)->first()) {
                $count++;
                $newAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $newAlias]);
        }
        $news_category = NewsCategory::create($request->all());
        $request->session()->flash('status', 'Thêm mới danh mục thành công!');
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $news_category)
    {
        return response()->json($news_category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $news_category)
    {
        $title = 'Sửa Danh Mục';
        $this->recursive(NewsCategory::where('id', '<>', $news_category->id)->get(), $news_category->parent_id);
        $categories = $this->list;
        return view('backend.news-category.form', compact('title', 'news_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryRequest $request, NewsCategory $news_category)
    {
        if (!$request->parent_id) {
            $request->merge(['parent_id' => 0]);
        }
        if (!$request->alias) {
            $alias = str_slug($request->name);
            $newAlias = $alias;
            $count = 0;
            while (NewsCategory::where('alias', $newAlias)->where('id', '<>', $news_category->id)->first()) {
                $count++;
                $newAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $newAlias]);
        }
        $news_category->update($request->all());
        $request->session()->flash('status', 'Sửa danh mục thành công!');
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, NewsCategory $news_category)
    {
        $count = $news_category->news->count();
        if (!$count) {
            $news_category->delete();
            $request->session()->flash('status', 'Xóa danh mục thành công!');
            return 1;
        }
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

    public function serialize(Request $request) {
        if (count($request->data)) {
            $this->updatePosition($request->data, 0);
        }
        $request->session()->flash('status', 'Thay đổi vị trí danh mục thành công');
        return 1;
    }

    public function updatePosition($data, $parent) {
        foreach ($data as $key => $val) {
            $cat = NewsCategory::find($val['id']);
            if ($cat) {
                $cat->update(['parent_id' => $parent, 'position' => $key]);
                $cat->save();
                if (isset($val['children']) && count($val['children'])) {
                    $this->updatePosition($val['children'], $val['id']);
                }
            }
        }
    }
}
