<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    protected $id=[];
    public function getList(Request $request) {
        $news = [];
        News::orderBy('id', 'desc')->paginate(6)->map(function ($item) use (&$news) {
            $news[] = [
                'image'         => url('upload/news/' . $item->image),
                'date'          => Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d'),
                'month'         => Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('M'),
                'title'         => $item->title,
                'description'   => $item->description,
                'category'      => $item->category->name,
                'aliascategory' =>$item->category->alias,
                'alias'         => $item->alias,
                'tag'           => $item->tag
            ];
        });
    	return response()->json([
    		'status' => 'Thành công',
    		'code'   => 200,
    		'data'   => $news
    	]);
    }

    // API lấy danh sách tin tức theo Alias, có phân trang
    public function getListFilter(Request $request) {
        $news     = [];
        $category = NewsCategory::where('alias',$request->alias)->first();
        if($category) {
            $this->id[] = $category->id;
            $this->childList($category);
        }
        News::whereIn('category_id', $this->id)->orderBy('created_at', 'desc')->paginate(6)->map(function ($item) use (&$news) {
            $news[] = [
                'image'       => url('upload/news/' . $item->image),
                'date'        => Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d'),
                'month'       => Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('M'),
                'title'       => $item->title,
                'description' => $item->description,
                'category'    => $item->category->name,
                'alias'       => $item->alias,
                'meta_title'  => $item->meta_title,
                'tag'         => $item->tag
            ];
        });
        return response()->json([
            'status' => 'Thành công',
            'code'   => 200,
            'data'   => $news
        ]);
    }

    // Lây tin tức mới nhất
    public function getLastest(Request $request) {
    	$news = [];
    	News::orderBy('created_at','desc')->get()->map(function($item) use (&$news) {
    		$news[] = [
    			'image'       => url('upload/news/'. $item->image),
    			'title'       => $item->title,
                'alias'       => $item->alias,
                'content'     => $item->content,
                'tag'         => $item->tag,
                'description' => $item->description,
    			'date'        => Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d'),
                'month'       => Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('M'),
    		];
    	});
    	return response()->json([
    		'status' => 'Thành công',
    		'code  ' => 200,
    		'data'   => $news,
     	]);
    }

    // trường hợp lấy bài viết chi tiết phải check alias
    public function getDetail(Request $request) {
    	if (!$request->alias) {
    		return response()->json([
	    		'status' => 'Chưa cung cấp alias',
	    		'code'   => 400,
	    	]);
    	}
    	$news = News::where('alias', $request->alias)->first();

    	if (!$news) {
    		return response()->json([
	    		'status' => 'Không tìm thấy bài viết có alias tương ứng',
	    		'code'   => 400,
	    	]);
    	}
        $news->user_image   = $news->user->getImage();
        $news->image        = $news->getImage();
        $news->date         = Carbon::createFromFormat('Y-m-d H:i:s', $news->created_at)->format('d M, Y');
        $news->news_comment = $news->comment->count();
    	return response()->json([
    		'status'   => 'Thành công',
    		'code'     => 200,
    		'data'     => $news
    	]);
    }

    public function childList($data) {
        if($data->child) {
            foreach($data->child as $c) {
                $this->id[] = $c->id;
                $this->childList($c);
            }
        }
    }
}
