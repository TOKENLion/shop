<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProductLogService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProductLogService';
    }
}