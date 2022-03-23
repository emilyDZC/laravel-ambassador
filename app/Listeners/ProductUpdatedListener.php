<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProductUpdatedEvent;

class ProductUpdatedListener
{
    public function handle(ProductUpdatedEvent $event)
    {
        \Cache::forget('products_frontend');
        \Cache::forget('products_backend');
    }
}
