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
        Product::where('quantity', '<', 10)->delete();
    }
}
