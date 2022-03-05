<?php

namespace App\Misc\Facade;

use Illuminate\Support\Facades\Facade;

class CacheFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'cacher';
    }

}
