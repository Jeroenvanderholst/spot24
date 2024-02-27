<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class EtimApi
{
    /**
     * Handle an incoming request that requires interaction with the ETIM Api.
     * This class handles the ETIM Api connection, authentication and token retrieval.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                
        // Check if a token was already issued and stored in the session

        $tokenData = Session::get('etim_connection');

        if($tokenData && $this->isTokenValid($tokenData)) {
          
            return $next($request);
        }

        // If no token is found or it's expirec, retrieve a new token

        $response = $this->retrieveToken();


         //Check if the response was succesful

        if ($response->successful()) {
            $tokenData = $response->json();

            // Retrieve the bearer token from the response
            $bearerToken = $tokenData['access_token'];
           
            // Use the bearer token as needed

            $etimConnection = [
                'etim_access_token' => $bearerToken,
                'expires_at' => now()->addSeconds(3600),
            ];

            Session::put('etim_connection', $etimConnection);

            //Proceed with the request

            return $next($request);

        }
    }

        
    private function isTokenValid($etimConnection)
    {
        if ($etimConnection['expires_at'] > now()) {
            return true;
        }

        return false;

    }

    private function retrieveToken()
    {
        // Get the client credentials from the ENV file and set the scope
        $client_id = env('ETIM_CLIENT_ID');
        $client_secret = env('ETIM_CLIENT_SECRET');
        $scope = env('ETIM_SCOPE');

        // Set the API's token endpoint

        $authUrl = env('ETIM_AUTH_URL');

        try{

            $response = Http::withoutVerifying()->withHeaders([

            // 'Authorization' => 'Basic' . $encodedCredentials,
             'Accept' => 'application/json',
            ])->asForm()->post($authUrl,  [
                'grant_type' => 'client_credentials', //assuming 'client credentials' grant type
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'scope' => $scope,
            ]);

            return $response;

        } catch (Exception $error) {

            // Handle the error
            $error = $response->body();

            // Log or return the error message
            dd($error);

        }
    }
}
