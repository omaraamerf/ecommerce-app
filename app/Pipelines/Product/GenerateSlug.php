<?php

namespace App\Pipelines\Product;

use Closure;
use Illuminate\Support\Str;

class GenerateSlug
{
    public function __invoke(array $data, Closure $next)
    {
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        return $next($data);
    }
}
