<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'id'     => $this->resource->id,
            'name'   => $this->resource->name,
            'cash'   => $this->resource->cash,
            'number' => $this->resource->number,
            'bank_id'   => $this->resource->bank_id,
        ];
    }
}
