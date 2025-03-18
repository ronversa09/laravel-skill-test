<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\FakeApiPlatziService;
use App\Services\FakeStoreApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class ThirdPartyApiTest extends TestCase
{
    public function test_add_product_with_fake_api_platzi_service()
    {
        Http::fake([
            'https://fakeapi.platzi.com/products' => Http::response(['id' => 1, 'title' => 'Test Product'], 201),
        ]);

        $service = new FakeApiPlatziService();
        $response = $service->addProduct([
            'title' => 'Test Product',
            'body' => 'This is a test product.',
        ]);

        $this->assertEquals(201, $response->status());
        $this->assertEquals('Test Product', $response->json()['title']);
    }

    public function test_add_product_with_fake_store_api_service()
    {
        Http::fake([
            'https://fakestoreapi.com/products' => Http::response(['id' => 1, 'title' => 'Test Product'], 201),
        ]);

        $service = new FakeStoreApiService();
        $response = $service->addProduct([
            'title' => 'Test Product',
            'body' => 'This is a test product.',
        ]);

        $this->assertEquals(201, $response->status());
        $this->assertEquals('Test Product', $response->json()['title']);
    }
}
