<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    protected $guarded  = ['id'];

    public function section() {
    	return $this->belongsTo(Section::class, 'section_id');
    }
}
