<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Helpers\FileUpload;

class SettingController extends Controller
{   
    protected $module = 'Quản Lý Chung';

    public function __construct() {
        view()->share([
            'page' => 'setting',
            'module' => $this->module
        ]);
    }
    
    public function getSetting() {
        $title = $this->module;
        $setting = [];
        Setting::get()->map(function($item) use (&$setting) {
            $setting[$item->key] = $item->value;
        });
        return view('backend.setting.index', compact('title', 'setting'));
    }

    public function postSetting(SettingRequest $request) {
        if($request->hasFile('logo')) {
            $logo = FileUpload::upload($request->file('logo'), 'setting');
            if ($logo) {
                Setting::setRecord('logo', $logo);
            }
        }
        foreach ($request->except('_token', 'logo') as $k => $v) {
            Setting::setRecord($k, $v);
        }
        return redirect('admin/setting')->with('status','Cập nhật thông tin chung thành công!');
    }
}
