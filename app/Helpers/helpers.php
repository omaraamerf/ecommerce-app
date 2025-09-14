<?php

use Illuminate\Support\Str;

if (!function_exists('money')) {
    function money(int|float $amount, string $currency = 'USD'): string
    {
        return number_format($amount, 2) . ' ' . $currency;
    }
}

if (!function_exists('slugify')) {
    function slugify(string $text): string
    {
        return Str::slug($text);
    }
}


