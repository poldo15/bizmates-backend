<?php

namespace App\Services;

use App\Resources\FourSquareResourceInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class FourSquareResource implements FourSquareResourceInterface
{
    public function getFourSquare(Request $request)
    {


        $params = [
            'query' => 'Tokyo'
        ];
        
        $client = new Client(['verify' => false]);
        $response = $client->request('GET', env('FOURSQUARE_URL'), [
            'headers' => [
                'Authorization' => env('FOURSQUARE_API_KEY'),
                'Accept' => 'application/json',
            ],
            $params
        ]);

        return json_decode( $response->getBody() );
    }
}