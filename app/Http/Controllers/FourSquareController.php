<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\FourSquareResourceInterface;

class FourSquareController extends Controller
{
    //
    private $_fourSquare;

    public function __construct(FourSquareResourceInterface $fourSquare)
    {
        $this->_fourSquare = $fourSquare;
    }

    public function index(Request $request)
    {
        return $this->_fourSquare->getFourSquare($request);
    }
}
