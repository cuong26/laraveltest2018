<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class infoUser extends Model
{
    // use Notifiable;
    protected $table = 'sinhvien';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TEN', 'TUOI', 'KHOAHOC', 'remember_token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         
    ];
}
