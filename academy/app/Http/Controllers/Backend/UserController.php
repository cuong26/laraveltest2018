<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\FileUpload;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $module = 'Quản lý người dùng';

    public function __construct() {
        view()->share([
            'page' => 'user',
            'module' => $this->module,
            'role' => ['Người nhập nội dung', 'Quản trị viên']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản Lý Người Dùng";
        $user = User::orderBy('id','desc');
        if ($request->search){
            $user = $user->where('name','like', '%'.$request->search.'%');
        }
        $user = $user->paginate(10);
        return view('backend.user.index',compact('title','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm Mới Người Dùng";
        return view('backend.user.form',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('avartar')){
            $image = FileUpload::upload($request->file('avartar'), 'users');
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'image'    => isset($image) ? $image : '',
            'role'     => $request->role,
        ]);
        return redirect('admin/user')->with('status',"Thêm người dùng thành công");
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
    public function edit(User $user)
    {
        $title = "Sửa Người Dùng";
        return view('backend.user.form',compact('title','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if ($request->hasFile('avartar')){
            $image = FileUpload::upload($request->file('avartar'), 'users');
        }
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'image'    => isset($image) ? $image : $user->image,
            'role'     => $request->role
        ]);
        return redirect('admin/user')->with('status',"Sửa người dùng thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $count = $user->news->count();
        if (!$count) {
            $user->delete();
            $request->session()->flash('status','Xóa người dùng thành công');
            return 1;
        }
    }
}
