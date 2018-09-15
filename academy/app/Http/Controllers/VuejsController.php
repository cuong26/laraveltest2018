<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VuejsController extends Controller
{
     public function index()
    {
    	return view('welcome');
    }
}
