<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = 'setting';
	protected $fillable = ['key', 'value'];
	public $timestamps = false;
    protected $primaryKey = 'key';
    public $incrementing = false;

    public static function getRecord($key) {
    	$setting = self::where('key', $key)->first();
    	return $setting ? $setting->value : null;
    }

    public static function setRecord($key, $value) {
    	$setting = self::where('key', $key)->first();
    	if ($setting) {
    		$setting->value = $value;
            $setting->save();
    	} else {
    		$setting = self::create([
    			'key' => $key,
    			'value' => $value,
    		]);
    	}
    	return $setting;

    }
}
