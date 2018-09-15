<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    protected $table = 'course';
    protected $guarded  = ['id'];

    public function getImage() {
    	return url('upload/course', $this->image);
    }

    public function courseCategory() {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function getCourseStartAttribute($date) {
    	return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function setCourseStartAttribute($date) {
    	$this->attributes['course_start'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public function getCourseEndAttribute($date) {
    	return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function setCourseEndAttribute($date) {
    	$this->attributes['course_end'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public function getClassStartAttribute($date) {
        return Carbon::createFromFormat('H:i:s', $date)->format('H:i');
    }

    public function getClassEndAttribute($date) {
        return Carbon::createFromFormat('H:i:s', $date)->format('H:i');
    }

    public function setSchoolDayAttribute($day) {
        $this->attributes['school_day'] = json_encode($day);
    }

    public function getSchoolDayAttribute($day) {
        return json_decode($day);
    }

    public function setPriceAttribute($price) {
        $this->attributes['price'] = str_replace(',', '', $price);
    }

    public function section() {
        return $this->hasMany(Section::class, 'course_id')->orderBy('number', 'asc');
    }

    public function lesson() {
        return $this->hasManyThrough(Lesson::class, Section::class, 'course_id', 'section_id');
    }

    public function comment() {
        return $this->hasMany(CourseComment::class, 'course_id');
    }
}
