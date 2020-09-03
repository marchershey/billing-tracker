<?php

namespace App\Http\Controllers\Drivers\Rates;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatesController extends Controller
{
    public function index()
    {
        $rates = Auth::user()->rates()->first();
        return view('sections.drivers.rates.index', compact('rates'));
    }
}
