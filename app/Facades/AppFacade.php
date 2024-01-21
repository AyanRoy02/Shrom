<?php

namespace App\Facades;
use App\AppSetting;
use Illuminate\Support\Facades\Facade;
class AppFacade
{
    public static function generateActivityLog(string $string, string $string1)
    {
    }

    protected static function getFacadeAccessor(): string
    {
        return 'Shrom';
    }
}
