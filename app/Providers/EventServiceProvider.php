<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $observers = [
        \App\Models\Product::class => [\App\Observers\ProductObserver::class],
    ];


    public function boot(): void
    {
        //
    }

    // ...
}
