<?php

namespace Rabsanaco\Locale;

use Illuminate\Support\Facades\Facade;

class LocaleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Locale::class;
    }

}
