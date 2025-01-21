<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'createdAt' => $this->created_at,
            'likeCount' => $this->likes_count,
            'dislikeCount' => $this->dislikes_count,
            'isLike' => (bool)count($this->likes),
            'isDislike' => (bool)count($this->dislikes),
        ];
    }
}
