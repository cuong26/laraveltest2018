<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource ;
use App\Http\Resources\infomation as AllResource;
use App\infoUser;

class apisvcontroller extends Controller
{
    public function getsv($id)
    {
    	return new UserResource(infoUser::find($id));
    }
    public function alluser()
    {
    	
    	return new AllResource(infoUser::all());
    }
    public function deletesv(Request $request, $id)
    {
        $delete = infoUser::findOrFail($id);
        $delete->delete();

        return 204;
    }
    public function update(Request $request, $id)
    {
        $update = infoUser::findOrFail($id);
        $update->update($request->all());

        return $update;
    }
    public function store(Request $request)
   {
        return infoUser::create($request->all());
   }   
}
