<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CourseCategoryRequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseCategoryController extends Controller
{
    protected $module = 'Quản Lý Nội Dung';
    protected $list;
    public function __construct() {
        view()->share([
            'page' => 'course-category',
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
        $course_category = CourseCategory::orderBy('id', 'desc');
        if ($request->search) {
            $course_category = $course_category->where('name','like', '%'.$request->search.'%');
        }
        $course_category = $course_category->paginate(20);
        $title = $this->module;
        $this->recursive(CourseCategory::all());
        $categories = $this->list;
        $nestable = view('backend.course-category._nestable', ['data' => CourseCategory::where('parent_id', 0)->orderBy('position', 'asc')->get()])->render();
        return view('backend.course-category.index', compact('title', 'nestable', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm Danh Mục';
        $this->recursive(CourseCategory::all());
        $categories = $this->list;
        return view('backend.course-category.form', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCategoryRequest $request)
    {
        if (!$request->parent_id) {
            $request->merge(['parent_id' => 0]);
        }
        if (!$request->alias) {
            $alias = str_slug($request->name);
            $newAlias = $alias;
            $count = 0;
            while (CourseCategory::where('alias', $newAlias)->first()) {
                $count++;
                $newAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $newAlias]);
        }
        $course_category = CourseCategory::create($request->all());
        $request->session()->flash('status', 'Thêm mới danh mục thành công!');
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCategory $course_category)
    {
        return response()->json($course_category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCategory $course_category)
    {
        $title = 'Sửa Danh Mục';
        $this->recursive(CourseCategory::where('id', '<>', $course_category->id)->get(), $course_category->parent_id);
        $categories = $this->list;
        return view('backend.course-category.form', compact('title', 'course_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseCategoryRequest $request, CourseCategory $course_category)
    {
        if (!$request->parent_id) {
            $request->merge(['parent_id' => 0]);
        }
        if (!$request->alias) {
            $alias = str_slug($request->name);
            $newAlias = $alias;
            $count = 0;
            while (CourseCategory::where('alias', $newAlias)->where('id', '<>', $course_category->id)->first()) {
                $count++;
                $newAlias = $alias . '-' . $count;
            }
            $request->merge(['alias' => $newAlias]);
        }
        $course_category->update($request->all());
        $request->session()->flash('status', 'Sửa danh mục thành công!');
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CourseCategory $course_category)
    {
        $count = $course_category->course->count();
        if (!$count) {
            $course_category->delete();
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
            $cat = CourseCategory::find($val['id']);
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
