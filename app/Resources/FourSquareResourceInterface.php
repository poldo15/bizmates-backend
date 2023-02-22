<?php

namespace App\Resources;

use Illuminate\Http\Request;

interface FourSquareResourceInterface
{
    public function getFourSquare(Request $request);
}