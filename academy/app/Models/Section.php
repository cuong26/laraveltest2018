<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';
    protected $guarded  = ['id'];

    public function course() {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function lesson() {
    	return $this->hasMany(Lesson::class, 'section_id')->orderBy('number', 'asc');
    }
}
