<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $guarded = ['id'];

    public function child()
    {
        return $this->hasMany(CourseCategory::class, 'parent_id')->orderBy('position', 'asc');
    }

    public function sibling()
    {
        return $this->child()->with('sibling');
    }

    public function parent() {
        return $this->belongsTo(CourseCategory::class, 'parent_id');
    }

    public function course() {
        return $this->hasMany(Course::class, 'category_id');
    }
}
