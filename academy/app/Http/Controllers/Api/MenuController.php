<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    protected $menu = [];

    public function getList(){
        // $menu = Menu::where('parent_id', 0)->with('sibling')->get()->toArray();
        $menu = Menu::where(['parent_id' => 0, 'status' => 1])->orderBy('position', 'asc')->get();
        $result = [];
        if ($menu) {
            foreach ($menu as $m) {
                $result[]  = $this->getChild($m);
            }
        }
        return response()->json([
            'status' => 'Thành công',
            'code'   => 200,
            'data'   => $result
        ]);
    }
    public function getChild($data) {
        $result = [];
        $result['name'] = $data->name;
        $result['link'] = $data->link;
        $result['position'] = $data->position;
        $result['status'] = $data->status;
        if ($data->child) {
            foreach($data->child as $c)
            if($c->status){
                $result['child'][] = $this->getChild($c);
            }
        }
        return $result;
    }
}
