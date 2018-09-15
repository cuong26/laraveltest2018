<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $guarded = ['id'];

    public function getImage(){
        return url('upload/banner', $this->image);
    }
}
