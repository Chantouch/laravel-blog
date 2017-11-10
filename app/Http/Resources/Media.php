<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Media extends Resource
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
            'filename' => $this->filename,
            'original_filename' => $this->original_filename,
            'mime_type' => $this->mime_type,
            'mediable_id' => $this->mediable_id,
            'mediable_type' => $this->mediable_type,
            'url' => asset('storage/uploads/media/' . $this->filename)
        ];
    }
}
