<?php

namespace App\Pipelines\Product;

use App\Enums\ProductStatus;
use Closure;

class SetDefaultStatus
{
    public function __invoke(array $data, Closure $next)
    {
        if (!isset($data['status'])) {
            $data['status'] = ProductStatus::DRAFT->value;
        }
        return $next($data);
    }
}
