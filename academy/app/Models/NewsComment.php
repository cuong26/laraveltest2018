<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    protected $table = 'news_comment';
    protected $guarded  = ['id'];

    public function news() {
    	return $this->belongsTo(News::class, 'news_id');
    }
}
