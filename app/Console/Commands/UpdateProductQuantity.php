<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateProductQuantity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:update-quantity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update quantity of the products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productId = $this->argument('id');
        $newQuantity = $this->argument('quantity');

        // Find product by ID
        $product = Product::find($productId);

        if (!$product) {
            $this->error('Product not found!');
            return;
        }

        // Update product quantity
        $product->update(['quantity' => $newQuantity]);

        $this->info("Product ID {$productId} updated to quantity: {$newQuantity}");
    }
}
