<?php

namespace App\Services;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\Product;

class FakeApiPlatziService implements ProductInterface
{
    public function addProduct(array $data): Response
    {
        // Check for duplicate product name
        if (Product::where('title', $data['title'])->exists()) {
            return new Response(new \GuzzleHttp\Psr7\Response(409, [], json_encode(['error' => 'Product name already exists'])));
        }

        return Http::post('https://fakeapi.platzi.com/products', $data);
    }
}
