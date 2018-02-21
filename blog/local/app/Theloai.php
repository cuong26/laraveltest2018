<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
     protected $table = 'theloai';
    public $timestamps = false;

    public function tintuc(){
    	return $this ->hasMany("App\Tintuc","theloai_id");
    }

}
