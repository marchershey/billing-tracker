<?php

namespace App\Http\Controllers\Drivers\Dispatch;

use App\Dispatch;
use App\DispatchStatus;
use App\DispatchStopType;
use App\Http\Controllers\Controller;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DispatchController extends Controller
{
    public function index()
    {
        //
    }

    public function start()
    {
        $statuses = DispatchStatus::where('driver_hidden', 0)->get();
        return view('sections.dispatch.start', compact('statuses'));
    }

    public function start_post(Request $request)
    {
        $data = $request->validate([
            'reference_number' => 'required|numeric|unique:App\Dispatch,reference_number',
            'stop_count' => 'required|numeric|min:1|max:10',
            'starting_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|numeric',
        ], [
            'reference_number.required' => '<span class="font-extrabold">Missing Reference Number</span><br>This can be found on your FirstFleet app or the paperwork.',
            'reference_number.numeric' => 'Invalid <span class="font-extrabold">Reference Number</span><br>The Reference Number can only contain numbers.',
            'reference_number.unique' => '<span class="font-extrabold">Reference Number already assigned</span><br>That Reference Number has been assigned to a dispatch already.',
        ]);

        $dispatch = new Dispatch();
        $dispatch->reference_number = $data['reference_number'];
        $dispatch->stop_count = ($data['stop_count'] < 1) ? 1 : $data['stop_count'];
        $dispatch->starting_date = $data['starting_date'];
        $dispatch->status_id = $data['status'];
        $dispatch->user_id = Auth::user()->id;
        $dispatch->save();

        return redirect('./driver/dispatch/' . $dispatch->reference_number);
    }

    public function show($reference_number)
    {
        $dispatch = Dispatch::where('reference_number', $reference_number)->firstOrFail();
        $statuses = DispatchStatus::where('driver_hidden', 0)->get();
        $stopTypes = DispatchStopType::where('active', 1)->get();

        if ($dispatch->user_id === Auth::id()) {
            return view('sections.dispatch.show', compact('dispatch', 'statuses', 'stopTypes'));
        } else {
            abort(401);
        }

    }

    public function show_post(Request $request, $reference_number)
    {

        $dispatch = Dispatch::where('reference_number', $reference_number)->first();

        $data = $request->validate([
            'reference_number' => 'required|numeric',
            'stop_count' => 'required|numeric|min:0|max:10',
            'starting_date' => 'required|date|date_format:Y-m-d',
            'status' => 'required|numeric',
            'position' => 'numeric',
            'stops' => '',
        ], [
            'reference_number.required' => '<span class="font-extrabold">Missing Reference Number</span>.<br>This can be found on your FirstFleet app or the paperwork.',
            'reference_number.numeric' => '<span class="font-extrabold">Invalid Reference Number</span>.<br>The Reference Number can only contain numbers.',
            'reference_number.exists' => '<span class="font-extrabold">Reference Number</span> doesn\'t exists.<br>That Reference Number does not exist.',
        ]);

        $dispatch->update([
            'reference_number' => $data['reference_number'],
            'stop_count' => $data['stop_count'],
            'starting_date' => $data['starting_date'],
            'status_id' => $data['status'],
            'stop_count' => $data['stop_count'],
        ]);

        foreach ($data['stops'] as $key => $stop) {
            if (isset($stop['tray_count'])) {
                $data['stops'][$key]['roll_offs'] = $stop['tray_count'];
                $data['stops'][$key]['pack_outs'] = $stop['tray_count'];
            }

            if (!isset($stop['different'])) {
                $data['stops'][$key]['different'] = 'off';
            }
        }

        $stops = collect($data['stops'])->whereNotNull('warehouse_id')->keyBy('warehouse_id')->transform(function ($key) {
            unset($key['warehouse_id']);
            return $key;
        });

        $stops = collect($data['stops'])->whereNotNull('warehouse_id')->keyBy('warehouse_id')->transform(function ($key) {
            unset($key['warehouse_id']);
            return $key;
        });

        $dispatch->stops()->sync($stops);

        return redirect('./driver/dispatch/' . $data['reference_number'])->with('success', 'This dispatch has been updated.');
    }

    public function warehouse_search(Request $request)
    {
        $data = $request->validate([
            'string' => 'required',
        ]);

        $locations = Warehouse::where('name', 'like', '%' . $data['string'] . '%')->limit(3)->get();

        return $locations;
    }

    public function calc_rate(Request $request)
    {
        $rates = Auth::user()->rates()->first();

        $data = $request->validate([
            'value' => 'required|numeric',
            'stop_type' => 'required',
            'data_type' => 'required',
        ]);

        if ($data['data_type'] == 'miles') {
            $amount = $data['value'] * $rates->mileage;
        } else if ($data['data_type'] == 'drops') {
            $amount = $data['value'] * $rates->mileage;
        } else if ($data['data_type'] == 'tray') {
            if ($data['stop_type'] == 'rolloff') {
                $amount = $data['value'] * $rates->roll_off;
            } else if ($data['stop_type'] == 'packout') {
                $amount = (($data['value'] * $rates->roll_off) + ($data['value'] * $rates->pack_out));
            }
        } else if ($data['data_type'] == 'rolloff') {
            $amount = $data['value'] * $rates->roll_off;
        } else if ($data['data_type'] == 'packout') {
            $amount = $data['value'] * $rates->pack_out;
        }

        return round($amount, 2, PHP_ROUND_HALF_UP);
    }

}
