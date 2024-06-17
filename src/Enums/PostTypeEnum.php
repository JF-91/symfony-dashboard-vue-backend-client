<?php 
namespace App\Enums;

enum PostTypeEnum : string
{
    case NEW_PRODUCT = 'new_product';
    case PROMOTION = 'promotion';

    case UNKNOWN = 'unknown';

    public static function getValues(): array
    {
        return [
            self::NEW_PRODUCT,
            self::PROMOTION,
            self::UNKNOWN,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::NEW_PRODUCT => 'New Product',
            self::PROMOTION => 'Promotion',
            self::UNKNOWN => 'Unknown',
        ];
    }
}