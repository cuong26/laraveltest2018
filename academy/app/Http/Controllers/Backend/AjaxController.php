<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use DB;

class AjaxController extends Controller
{
    public function checkMail(Request $request) {
    	$result = DB::table($request->table)->where('email', $request->email)->first();
    	if ($result) {
    		return $result->id == $request->id ? 'true' : 'false';
    	}
    	return 'true';
    }

    public function checkAlias(Request $request) {
    	$result = DB::table($request->table)->where('alias', $request->alias)->first();
    	if ($result) {
    		return $result->id == $request->id ? 'true' : 'false';
    	}
    	return 'true';
    }

    public function checkComment(Request $request) {
        $status = (1 - $request->status);
        DB::table($request->table)->where('id', $request->id)->update(['status' => $status]);
        return response()->json(['status' => $status]);
    }

    public function loadSection(Request $request) {
        return view('backend.template.section', ['count' => $request->count])->render();
    }

    public function loadLesson(Request $request) {
        return view('backend.template.lesson', ['count' => $request->count, 'subcount' => $request->subcount])->render();
    }
}
