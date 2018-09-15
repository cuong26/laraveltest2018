<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $guarded  = ['id'];

    public function child()
	{
	    return $this->hasMany(NewsCategory::class, 'parent_id')->orderBy('position', 'asc');
	}

	public function sibling()
	{
	    return $this->child()->with('sibling');
	}

	public function parent() {
		return $this->belongsTo(NewsCategory::class, 'parent_id');
	}

	public function news() {
		return $this->hasMany(News::class, 'category_id');
	}
}
