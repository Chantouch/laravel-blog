<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Tag extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => route('tags.show', [$this->slug])
        ];
    }
}
