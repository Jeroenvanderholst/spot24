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
        $tokenData = Session::get('etim_connection');   
                
        if($tokenData && $this->isTokenValid($tokenData)) {
          
            return $next($request);
        }

        $response = $this->retrieveToken();

        if ($response->successful()) {
            $tokenData = $response->json();

            $bearerToken = $tokenData['access_token'];
           
            $etimConnection = [
                'access_token' => $bearerToken,
                'expires_at' => now()->addSeconds(3600),
            ];

            Session::put('etim_connection', $etimConnection);

            return $next($request);

        } else {
            echo 'There was a problem with authenticating the ETIM API connection.';
            echo $response->body();       
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
        $client_id = env('ETIM_CLIENT_ID');
        $client_secret = env('ETIM_CLIENT_SECRET');
        $scope = env('ETIM_SCOPE');
        $authUrl = env('ETIM_AUTH_URL');

        try{

            $response = Http::withoutVerifying()->withHeaders([
             'Accept' => 'application/json',
            ])->asForm()->post($authUrl,  [
                'grant_type' => 'client_credentials',
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'scope' => $scope,
            ]);

            return $response;

        } catch (Exception $e) {

            echo 'There was a problem with authenticating the ETIM API connection.';
            echo $response->body();
            

        }
    }
}
