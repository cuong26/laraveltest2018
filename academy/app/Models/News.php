<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded  = ['id'];

    public function getImage() {
    	return url('upload/news', $this->image);
    }

    public function category() {
    	return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    public function comment() {
    	return $this->hasMany(NewsComment::class, 'news_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
