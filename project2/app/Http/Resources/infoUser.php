<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class infoUser extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->TEN,
            'khoahoc' => $this->KHOAHOC,
            'created_at' => (string)$this->created_at,
            'updated_at' => $this->updated_at,
            'status' => 'success',
           
        ];
    }
}
