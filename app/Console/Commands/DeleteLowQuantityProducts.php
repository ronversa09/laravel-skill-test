<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class DeleteLowQuantityProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete-low-quantity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete products with less than 10 quantity';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $count = Product::where('quantity', '<', 10)->count();
        if ($count == 0) {
            $this->info('No low-stock products to delete.');
            return;
        }

        // Delete products with quantity less than 10
        Product::where('quantity', '<', 10)->delete();

        $this->info("Deleted {$count} products with low stock.");
    }
}
