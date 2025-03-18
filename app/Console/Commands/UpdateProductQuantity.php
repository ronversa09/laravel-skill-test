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
        // Logic to update quantity of the products
    }
}
