<?php

namespace App\Observers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProductNotification;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {

        Mail::to('no-reply@yourapp.com')->send(new NewProductNotification($product));
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
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
}
