<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
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
            'id'       => $this->resource->id,
            'name'     => $this->resource->name,
            'slug'     => $this->resource->slug,
            'settings' => BankSettingResource::collection($this->resource->settings)
        ];
    }
}
