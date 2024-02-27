<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;


class EtimServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * 
     * @return void
     */

    public function register()
    {
        

        // Get the client credentials from the ENV file and set the scope
        $client_id = env('ETIM_CLIENT_ID');
        $client_secret = env('ETIM_CLIENT_SECRET');
        $scope = env('ETIM_SCOPE');


        // Set the API's token endpoint

        $tokenUrl = env('ETIM_AUTH_URL');

        // Make the POST request to retrieve the token

        $response = Http::withoutVerifying()->withHeaders([
           // 'Authorization' => 'Basic' . $encodedCredentials,
            'Accept' => 'application/json',
        ])->asForm()->post($tokenUrl,  [
            'grant_type' => 'client_credentials', //assuming 'client credentials' grant type
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'scope' => $scope,
        ]);

        //Check if the response was succesful

        if ($response->successful()) {
            $tokenData = $response->json();

            // Retrieve the bearer token from the response
            $bearerToken = $tokenData['access_token'];
           
            // Use the bearer token as needed

            $apiConnectionData = [
                'etim_access_token' => $bearerToken,
                'expires_at' => now()->addSeconds(3600),
            ];

            Session::put('api_connection_data', $apiConnectionData);

            
        } else {
            // Handle the error
            $error = $response->body();
            // Log or return the error message
            
        }


    }
    

    public function boot(): void
    {
    
     /**
     * Bootstrap services.
     */
    }

    /**
     * Register the API connection in cache or session with a maximum life of 3600 seconds.
     *
     * @param string|null $accessToken
     * @return void
     */


}