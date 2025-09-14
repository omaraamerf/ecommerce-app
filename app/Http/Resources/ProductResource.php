<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->id,
            'name' => $this->title,
            'description_short' => \Illuminate\Support\Str::limit($this->description, 100),
            'price' => [
                'amount' => $this->price,
                'currency' => 'USD',
                'formatted' => money($this->price, 'USD'),
            ],
            'in_stock' => $this->stock > 0,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                ];
            }),
        ];
    }
}
