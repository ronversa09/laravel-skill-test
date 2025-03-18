<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProductCreatedEmail
{
    public function __construct(){}

    public function handle(ProductCreated $event): void
    {
        $product = $event->product;
        Mail::to($product->user->email)->send(new \App\Mail\ProductCreated($product));
    }
}
