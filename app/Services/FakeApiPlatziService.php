<?php

namespace App\Services;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class FakeApiPlatziService implements ProductInterface
{
    public function addProduct(array $productData): Response
    {
        return Http::post('https://fakeapi.platzi.com/products', $productData);
    }
}
