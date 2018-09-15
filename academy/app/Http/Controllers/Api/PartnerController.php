<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
   	public function getList (Request $request){
   		$partner = [];
   		Partner::orderBy('id','desc')->get()->map(function($item) use (&$partner){
   			$partner[] = [
   				'id'   => $item->id,
   				'name' => $item->name,
                'logo'=> url('upload/partner/' . $item->logo),
   			];
   		});
   		return response()->json([
   			'status' => 'Thành công',
   			'code'   => 200,
   			'data'   => $partner,
   		]);
   	}
}
