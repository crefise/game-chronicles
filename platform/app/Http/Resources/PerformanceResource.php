<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerformanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'                => $this->resource->id,
            'label'             => $this->resource->label,
            'description'       => $this->resource->description,
            'short_description' => $this->resource->short_description,
            'owner_id'          => $this->resource->owner_id,
            'owner_email'       => $this->resource->owner->email,
        ];
    }
}
