<?php

namespace App\Services;

use App\Resources\OpenWeatherResourceInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class OpenWeatherResource implements OpenWeatherResourceInterface
{
    public function getOpenWeather($lat, $lon)
    {
        $params = [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'appid' => env('OPEN_WEATHER_API_KEY')
            ]
        ];

        $client = new Client();

        $response = $client->request('GET', env('OPEN_WEATHER_URL'), 
            $params
        );

        return json_decode( $response->getBody() );
    }
}