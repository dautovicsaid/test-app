<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
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
            'description' => $this->description,
            'brand' => $this->whenLoaded('brand', fn() => $this->brand->name),
            'image' => $this->whenLoaded('image', fn() => ImageResource::make($this->image)),
            'brand_id' => $this->whenLoaded('brand', fn() => $this->brand->id),
        ];
    }
}
