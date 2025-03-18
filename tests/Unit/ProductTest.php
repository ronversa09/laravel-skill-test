<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product()
    {
        $user = User::factory()->create();

        $product = Product::create([
            'user_id' => $user->id,
            'title' => 'Test Product',
            'body' => 'This is a test product.',
        ]);

        $this->assertDatabaseHas('products', [
            'title' => 'Test Product',
        ]);
    }

    public function test_read_product()
    {
        $product = Product::factory()->create([
            'title' => 'Test Product',
        ]);

        $foundProduct = Product::find($product->id);

        $this->assertEquals($product->title, $foundProduct->title);
    }

    public function test_update_product()
    {
        $product = Product::factory()->create([
            'title' => 'Old Title',
        ]);

        $product->update(['title' => 'New Title']);

        $this->assertDatabaseHas('products', [
            'title' => 'New Title',
        ]);
    }

    public function test_delete_product()
    {
        $product = Product::factory()->create([
            'title' => 'Test Product',
        ]);

        $product->delete();

        $this->assertDatabaseMissing('products', [
            'title' => 'Test Product',
        ]);
    }
}
