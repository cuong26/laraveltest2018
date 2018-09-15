<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $guarded = ["id"];

	public function child()
	{
		return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc');
	}

	public function sibling()
	{
		return $this->child()->with('sibling');
	}

	public function parent() {
		return $this->belongsTo(Menu::class, 'parent_id');
	}
}
