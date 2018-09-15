<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    protected $module = 'Quản Lý Menu';
    protected $list;
    public function __construct() {
        view()->share([
            'page' => 'menu',
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
        $menu = Menu::orderBy('id', 'desc');
        if ($request->search) {
            $menu = $menu->where('name','like', '%'.$request->search.'%');
        }
        $menu = $menu->paginate(20);
        $title = $this->module;
        $this->recursive(Menu::all());
        $menus = $this->list;
        $nestable = view('backend.menu._nestable', ['data' => Menu::where('parent_id', 0)->orderBy('position', 'asc')->get()])->render();
        return view('backend.menu.index', compact('title', 'nestable', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm Menu';
        $this->recursive(Menu::all());
        $menus = $this->list;
        return view('backend.menu.form', compact('title', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        if (!$request->parent_id) {
            $request->merge(['parent_id' => 0]);
        }
        $menu = Menu::create($request->all());
        $request->session()->flash('status', 'Thêm mới menu thành công!');
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return response()->json($menu, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $title = 'Sửa Menu';
        $this->recursive(Menu::where('id', '<>', $menu->id)->get(), $menu->parent_id);
        $menus = $this->list;
        return view('backend.menu.form', compact('title', 'menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        if (!$request->parent_id) {
            $request->merge(['parent_id' => 0]);
        }
        $menu->update($request->all());
        $request->session()->flash('status', 'Sửa menu thành công!');
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Menu $menu)
    {
        $menu->delete();
        $request->session()->flash('status', 'Xóa menu thành công!');
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

    public function serialize(Request $request) {
        if (count($request->data)) {
            $this->updatePosition($request->data, 0);
        }
        $request->session()->flash('status', 'Thay đổi vị trí menu thành công');
        return 1;
    }

    public function updatePosition($data, $parent) {
        foreach ($data as $key => $val) {
            $menu = Menu::find($val['id']);
            if ($menu) {
                $menu->update(['parent_id' => $parent, 'position' => $key]);
                $menu->save();
                if (isset($val['children']) && count($val['children'])) {
                    $this->updatePosition($val['children'], $val['id']);
                }
            }
        }
    }
}
