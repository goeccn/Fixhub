<?php

/*
 * This file is part of Fixhub.
 *
 * Copyright (C) 2016 Fixhub.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Additional Compiled Classes
    |--------------------------------------------------------------------------
    |
    | Here you may specify additional classes to include in the compiled file
    | generated by the `artisan optimize` command. These should be classes
    | that are included on basically every request into the application.
    |
    */

    'files' => [

        realpath(__DIR__ . '/../app/Providers/AppServiceProvider.php'),
        realpath(__DIR__ . '/../app/Providers/AuthServiceProvider.php'),
        realpath(__DIR__ . '/../app/Providers/EventServiceProvider.php'),
        realpath(__DIR__ . '/../app/Providers/RouteServiceProvider.php'),
        realpath(__DIR__ . '/../app/Providers/UpdateServiceProvider.php'),
        realpath(__DIR__ . '/../app/Providers/ValidationServiceProvider.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled File Providers
    |--------------------------------------------------------------------------
    |
    | Here you may list service providers which define a "compiles" function
    | that returns additional files that should be compiled, providing an
    | easy way to get common files from any packages you are utilizing.
    |
    */

    'providers' => [
        //
    ],

];
