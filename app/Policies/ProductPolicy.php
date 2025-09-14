<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function viewAny(User $user): bool
    {
        return $user->can('product.view');
    }

    public function view(User $user, Product $product): bool
    {
        return $user->can('product.view');
    }

    public function create(User $user): bool
    {
        return $user->can('product.create');
    }

    public function update(User $user, Product $product): bool
    {
        return $user->can('product.update');
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->can('product.delete');
    }

    public function restore(User $user, Product $product): bool
    {
        return $user->can('product.restore');
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return $user->can('product.force-delete');
    }
}
