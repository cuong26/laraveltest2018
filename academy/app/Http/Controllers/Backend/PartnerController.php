<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Http\Requests\PartnerRequest;
use App\Helpers\FileUpload;


class PartnerController extends Controller
{
    protected $module = 'Đối Tác';

    public function __construct() {
        view()->share([
            'page'   => 'partner',
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
        $partner = Partner::orderBy('id', 'desc');
        if ($request->search) {
            $partner = $partner->where('name', 'like', '%'.$request->search.'%');
        }
        $partner = $partner->paginate(20);
        $title   = $this->module;
        return view('backend.partner.index', compact('title', 'partner')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm Mới Đối Tác';
        return view('backend.partner.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        if($request->hasFile('logo_file')) {
            $logo = FileUpload::upload($request->file('logo_file'), 'partner');
            if ($logo) {
                $request->merge(['logo' => $logo]);
            }
        }
        $partner = Partner::create($request->except('logo_file'));
        return redirect('admin/partner')->with('status', 'Thêm mới đối tác thành công!');
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
    public function edit(Partner $partner)
    {
        $title = 'Sửa Đối Tác';
        return view('backend.partner.form', compact('title', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        if($request->hasFile('logo_file')) {
            $logo = FileUpload::upload($request->file('logo_file'), 'partner');
            if ($logo) {
                $request->merge(['logo' => $logo]);
            }
        }
        $partner->update($request->except('logo_file'));
        return redirect('admin/partner')->with('status', 'Sửa đối tác thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerRequest $request, Partner $partner)
    {
        $partner->delete();
        $request->session()->flash('status', 'Xóa đối tác thành công!');
        return 1;
    }
}
