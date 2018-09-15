<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
{
   public function getList(Request $request)
   {	
   		$news_category = [];
   		NewsCategory::whereHas('news')->orderBy('id','desc')->get()->map(function($item) use (&$news_category){
   			$news_category[] = [
				'name'  => $item->name,
                'alias' => $item->alias,
				'count' => $item->news->count(),
   			];
   		});
   		return response()->json([
    		'status' => 'Thành công',
    		'code' => 200,
    		'data' => $news_category
    	]);
   }
}
