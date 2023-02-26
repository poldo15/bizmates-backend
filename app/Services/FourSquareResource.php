<?php

namespace App\Services;

use App\Resources\FourSquareResourceInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class FourSquareResource implements FourSquareResourceInterface
{
    public function getFourSquare($lat, $lon, $keyword)
    {
        $latlon = $lat . ',' . $lon;
        // dd($keyword);

        $contents = [
            'headers' => [
                'Authorization' => env('FOURSQUARE_API_KEY'),
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'll' => $latlon,
                'query' => $keyword
            ]
        ];

        $client = new Client(['verify' => false]);

        $response = $client->request('GET', env('FOURSQUARE_URL'), 
            $contents
        );

        return json_decode( $response->getBody() );
    }
}