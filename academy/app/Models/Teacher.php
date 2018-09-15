<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $guarded  = ['id'];

    public function getImage() {
    	return url('upload/teacher', $this->image);
    }

    public function getBirthdayAttribute($date) {
    	return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function setBirthdayAttribute($date) {
    	$this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public function course() {
        return $this->hasMany(Course::class, 'teacher_id');
    }
}
