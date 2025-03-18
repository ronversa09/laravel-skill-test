<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Interfaces\ProductInterface;
use App\Services\FakeApiPlatziService;
use App\Services\FakeStoreApiService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductInterface::class, function ($app) {
            // You can switch between the two services here
            return new FakeApiPlatziService();
            // return new FakeStoreApiService();
        });
    }

    public function boot(): void
    {
        Product::observe(ProductObserver::class);
    }
}
