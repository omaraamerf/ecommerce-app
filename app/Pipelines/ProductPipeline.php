<?php

namespace App\Pipelines;

use App\Pipelines\Product\GenerateSlug;
use App\Pipelines\Product\SetDefaultStatus;

class ProductPipeline
{
    public function pipes(): array
    {
        return [
            GenerateSlug::class,
            SetDefaultStatus::class,
        ];
    }
}
