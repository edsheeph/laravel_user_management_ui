<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UserClassFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'userclass'; }
}
