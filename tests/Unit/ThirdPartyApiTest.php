<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThirdPartyApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_product_to_first_api()
    {
        $user = User::factory()->create();

        $productData = [
            'user_id' => $user->id,
            'title' => 'Test Product',
            'body' => 'This is a test product.',
            'quantity' => 50,
            'image' => 'test_image.jpg'
        ];

        // Mock the HTTP request to the first API
        Http::fake([
            'https://api.first.com/products' => Http::response(['success' => true], 200),
        ]);

        // Make the HTTP request to the first API
        $response = Http::post('https://api.first.com/products', $productData);

        // Assert that the request was successful
        $this->assertTrue($response->json('success'));

        // Assert that the product was created in the database
        $product = Product::create($productData);
        $this->assertDatabaseHas('products', [
            'title' => 'Test Product',
            'body' => 'This is a test product.',
            'quantity' => 50,
            'image' => 'test_image.jpg',
            'user_id' => $user->id,
        ]);
    }

    public function test_add_product_to_second_api()
    {
        $user = User::factory()->create();

        $productData = [
            'user_id' => $user->id,
            'title' => 'Test Product',
            'body' => 'This is a test product.',
            'quantity' => 50,
            'image' => 'test_image.jpg'
        ];

        // Mock the HTTP request to the second API
        Http::fake([
            'https://api.second.com/products' => Http::response(['success' => true], 200),
        ]);

        // Make the HTTP request to the second API
        $response = Http::post('https://api.second.com/products', $productData);

        // Assert that the request was successful
        $this->assertTrue($response->json('success'));

        // Assert that the product was created in the database
        $product = Product::create($productData);
        $this->assertDatabaseHas('products', [
            'title' => 'Test Product',
            'body' => 'This is a test product.',
            'quantity' => 50,
            'image' => 'test_image.jpg',
            'user_id' => $user->id,
        ]);
    }
}
