<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProductViewed;
class IncrementProductViewCount
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductViewed $event): void
    {
        $event->product->withoutTimestamps(fn() => $event->product->increment('view_count'));
    }
}
