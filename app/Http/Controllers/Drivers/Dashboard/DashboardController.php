<?php

namespace App\Http\Controllers\Drivers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dispatches = Auth::user()->dispatches()->orderByDesc('id')->paginate(Auth::user()->settings->dispatch_count);
        return view('sections.drivers.index', compact('dispatches'));
    }
}
