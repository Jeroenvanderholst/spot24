<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


class EtimServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * 
     * @return void
     */

    public function register()
    {
        {
            $this->app->singleton('etim-api-connection', function ($app) {
                // Retrieve the bearer token using client_credentials grant type
                $accessToken = $this->getAccessToken();

                // Register the API connection in cache or session
                $this->registerApiConnection($accessToken);

                return $accessToken;

            });
        }
    }
    
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
        /**
    /**
     * Retrieve a bearer token from an authentication server using client_credentials grant type.
     *
     * @return string|null
     */
    
    protected function getAccessToken()
    {
        try {
            $client = new Client();
            $response = $client->post(config('etim.auth_url'), [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => config('etim.client'),
                    'client_secret' => config('etim.secret'),
                    'scope' => config('etim.scope', ''),
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return $data['access_token'] ?? null;
        } catch (RequestException $e) {
            // Handle authentication error
            return null;
        }
    }

    /**
     * Register the API connection in cache or session with a maximum life of 3600 seconds.
     *
     * @param string|null $accessToken
     * @return void
     */
    protected function registerApiConnection($accessToken)
    {
        if (!empty($accessToken)) {
            $apiConnectionData = [
                'access_token' => $accessToken,
                'expires_at' => now()->addSeconds(3600),
            ];

            if (config('api-connection.cache_enabled', true)) {
                Cache::put('api_connection_data', $apiConnectionData, 3600);
            } else {
                Session::put('api_connection_data', $apiConnectionData);
            }
        }
    }
}