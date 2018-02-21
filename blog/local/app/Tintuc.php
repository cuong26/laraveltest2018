<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
     // use Notifiable;
    protected $table = 'tintuc';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tieude', 'noidung', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         
    ];
    public function theloai(){
        return $this->belongsTo("App\Theloai");
    }
}
