<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function getList (Request $request){
    	$setting = Setting::all()->pluck('value', 'key');
    	if (isset($setting['logo'])) {
    		$setting['logo'] = url('upload/setting/'. $setting['logo']);
    	}
    	return response()->json([
    		'status' => 'Thành công',
    		'code'	 => 200,
    		'data'	 => $setting,
		]);
    }

}
