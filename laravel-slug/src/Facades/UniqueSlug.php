<?php

namespace Nafiz\LaravelSlug\Facades;
use Illuminate\Support\Facades\Facade;

/**
**
 * @see  Nafiz\LaravelUniqueSlug\UniqueSlug
*/

class UniqueSlug extends Facade
{
    
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor():string
    {
        return 'Laravel-unique-slug';
    }

}