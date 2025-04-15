<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            "id" => $this->id,
            "created_at" => $this->created_at->format("Y-m-d H:i:s"),
            "name" => $this->name,
            "description" => $this->description,
            "user" => new UserResource($this->user),
            "upvote_count" => $this->upvote_count ?? 0,
            "user_has_upvoted" => (bool) $this->user_has_upvoted,
            "user_has_downvoted" => (bool) $this->user_has_downvoted,
            "comments" => CommentResource::collection($this->comments),
        ];
    }
}
