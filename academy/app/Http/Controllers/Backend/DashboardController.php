<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
    	$title = 'Vins Academy';
    	return view('backend.dashboard.index', compact('title'));
    }
}
