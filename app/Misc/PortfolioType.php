<?php

namespace App\Misc;

class PortfolioType
{

    const TYPE_ALL = 0;
    const TYPE_BLOG = 1;
    const TYPE_ARTICLE = 2;

    public static function types(): array
    {
        return [
            self::TYPE_ALL => 'All',
            self::TYPE_BLOG => 'Blog',
            self::TYPE_ARTICLE => 'Article',
        ];
    }

}
