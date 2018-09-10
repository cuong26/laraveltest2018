<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class infomation extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'response' => [
                'status' => 'success',
                'code' => 200,
                'data' => $this->collection,
            ],
            
            
        ];
    }
}
