<?php

namespace App\Factories;

use App\Interfaces\ProductInterface;
use App\Services\FakeStoreApiService;
use App\Services\FakeApiPlatziService;

class ProductServiceFactory 
{
    public static function make(string $service): ProductInterface
    {
        return match ($service) {
            'fakestore' => new FakeStoreApiService(),
            'platzi' => new FakeApiPlatziService(),
            default => throw new \InvalidArgumentException("Invalid product service: $service"),
        };
    }
}