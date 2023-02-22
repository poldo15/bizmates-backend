<?php

namespace App\Resources;

use Illuminate\Http\Request;

interface OpenWeatherResourceInterface
{
    public function getOpenWeather(Request $request);
}