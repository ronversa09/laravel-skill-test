<?php

namespace App\Services;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class FakeStoreApiService implements ProductInterface
{
    public function addProduct(array $productData): Response
    {
        return Http::post('https://fakestoreapi.com/products', $productData);
    }
}
