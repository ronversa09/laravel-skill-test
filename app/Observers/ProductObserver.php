<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Log::info('Product created: ' . $product->id);
        Cache::forget('products');
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        Log::info('Product updated: ' . $product->id);
        Cache::forget('products');
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        Log::info('Product deleted: ' . $product->id);
        Cache::forget('products');
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }

    public function creating(Product $product)
    {
        // Logic before creating a product
    }

    public function updating(Product $product)
    {
        // Logic before updating a product
    }

    public function deleting(Product $product)
    {
        // Logic before deleting a product
    }
}
