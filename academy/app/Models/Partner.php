<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $guarded  = ['id'];

    public function getLogo() {
    	return url('upload/partner', $this->logo);
    }
}
