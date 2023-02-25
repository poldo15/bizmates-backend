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
        $latlon = $request->lat . ',' . $request->lon;

        $contents = [
            'headers' => [
                'Authorization' => env('FOURSQUARE_API_KEY'),
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'll' => $latlon
            ]
        ];

        $client = new Client(['verify' => false]);

        $response = $client->request('GET', env('FOURSQUARE_URL'), 
            $contents
        );

        return json_decode( $response->getBody() );
    }
}