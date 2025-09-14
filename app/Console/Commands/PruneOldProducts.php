<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;


class PruneOldProducts extends Command
{

    protected $signature = 'app:prune-old-products';
    protected $description = 'Permanently delete soft-deleted products older than 30 days';


    public function handle()
    {
        $this->info('Starting to prune old soft-deleted products...');


        $cutoffDate = now()->subDays(30);


        $productsToDelete = Product::onlyTrashed()
            ->where('deleted_at', '<', $cutoffDate)
            ->get();

        if ($productsToDelete->isEmpty()) {
            $this->warn('No old products to prune. Job done.');
            return 0;
        }

        $count = $productsToDelete->count();
        $this->info("Found {$count} products to delete permanently.");





            foreach ($productsToDelete as $product) {
                $product->forceDelete();
            }

            $this->info("Successfully deleted {$count} products.");



        return 0;
    }
}
