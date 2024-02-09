<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
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
            'content' => $this->content,
            'comment_count' => $this->whenCounted('comments'),
            'user' => UserResource::make($this->whenLoaded('user')),
            'tweeted_at' => $this->created_at->diffForHumans(),
        ];
    }
}
