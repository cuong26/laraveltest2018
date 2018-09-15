<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function getBirthdayAttribute($date) {
        return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function setBirthdayAttribute($date) {
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}
