<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\OpenWeatherResourceInterface;

class OpenWeatherController extends Controller
{
    //
    private $_openWeather;

    public function __construct(OpenWeatherResourceInterface $openWeather)
    {
        $this->_openWeather = $openWeather;
    }

    public function index(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;
        return $this->_openWeather->getOpenWeather($lat, $lon);
    }
}
