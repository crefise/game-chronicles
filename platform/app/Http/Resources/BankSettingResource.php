<?php

namespace App\Http\Resources;

use App\Services\BankSettingService\BankSettingService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'    => $this->resource->id,
            'key'   => $this->resource->key,
            'value' => $this->resource->value,
            'name'  => trans(
                'banks.settings.' . array_flip(BankSettingService::ACTIVE_SETTINGS)[$this->resource->key]
            ),
        ];
    }
}
