<?php

namespace App\Enums;

enum ProductStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'مسودة',
            self::PUBLISHED => 'منشور',
            self::ARCHIVED => 'مؤرشف',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
