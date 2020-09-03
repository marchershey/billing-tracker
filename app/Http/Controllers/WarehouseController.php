<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    public function search(Request $request)
    {
        $data = $request->validate([
            'string' => 'required',
        ]);

        $locations = Warehouse::where('name', 'like', '%' . $data['string'] . '%')->limit(3)->get();

        return $locations;
    }
}
