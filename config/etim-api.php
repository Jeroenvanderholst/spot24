<?php

return [

/*
|------------------------------------------------------------------------
|ETIM API Configuration parameters
|------------------------------------------------------------------------
|This file contains the configuration of the object that takes 
|parameters from the .env file that are needed to interact
|with the ETIM api.
|
*/

'etim' => [
        'client' => env('ETIM_CLIENT_ID'),
        'secret' => env('ETIM_CLIENT_SECRET'),
        'auth_url' => env('ETIM_AUTH_URL'),
        'base_url' => env('ETIM_BASE_URL'),
        'scope' => env('ETIM_SCOPE'),
    ],

];
