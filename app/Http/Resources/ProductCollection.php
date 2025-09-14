<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [

            'data' => $this->collection->map(function ($product) use ($request) {

                $productData = (new ProductResource($product))->toArray($request);


                $productData['links'] = [
                    'details' => route('products.api.show', ['product' => $product->id]),
                ];

                return $productData;
            }),


            // 'meta' => [
            //     'total_products' => $this->total(),
            //     'per_page' => $this->perPage(),
            //     'current_page' => $this->currentPage(),
            //     'last_page' => $this->lastPage(),
            // ],
            // 'links' => [
            //     'first' => $this->url(1),
            //     'last' => $this->url($this->lastPage()),
            //     'prev' => $this->previousPageUrl(),
            //     'next' => $this->nextPageUrl(),
            // ],
        ];
    }
}

