<?php

namespace App\Http\Controllers;

class DispatchController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     // return view('sections.dispatch.start');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $statuses = DispatchStatus::where('driver_hidden', 0)->get();

    //     return view('sections.dispatch.start', compact('statuses'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'reference_number' => 'required|numeric|unique:App\Dispatch,reference_number',
    //         'stop_count' => 'required|numeric|min:1|max:10',
    //         'starting_date' => 'required|date|date_format:Y-m-d',
    //         'status' => 'required|numeric',
    //     ], [
    //         'reference_number.required' => '<span class="font-extrabold">Missing Reference Number</span><br>This can be found on your FirstFleet app or the paperwork.',
    //         'reference_number.numeric' => 'Invalid <span class="font-extrabold">Reference Number</span><br>The Reference Number can only contain numbers.',
    //         // 'reference_number.regex' => 'Invalid <span class="font-extrabold">Reference Number</span>.<br>Check and make sure you type it correctly.',
    //         'reference_number.unique' => '<span class="font-extrabold">Reference Number already assigned</span><br>That Reference Number has been assigned to a dispatch already.',
    //     ]);

    //     $dispatch = new Dispatch;
    //     $dispatch->reference_number = $data['reference_number'];
    //     $dispatch->stop_count = ($data['stop_count'] < 1) ? 1 : $data['stop_count'];
    //     $dispatch->starting_date = $data['starting_date'];
    //     $dispatch->status_id = $data['status'];
    //     $dispatch->user_id = Auth::user()->id;
    //     $dispatch->save();

    //     return redirect('./dispatch/' . $dispatch->reference_number);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($reference_number)
    // {
    //     $dispatch = Dispatch::where('reference_number', $reference_number)->firstOrFail();
    //     $statuses = DispatchStatus::where('driver_hidden', 0)->get();
    //     $stopTypes = DispatchStopType::where('active', 1)->get();

    //     // return $dispatch->stops[0]->pivot->type;

    //     if ($dispatch->user_id === Auth::id()) {
    //         return view('sections.dispatch.show', compact('dispatch', 'statuses', 'stopTypes'));
    //     } else {
    //         abort(401);
    //     }

    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     // using above as edit
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $reference_number)
    // {

    //     $dispatch = Dispatch::where('reference_number', $reference_number)->first();

    //     $data = $request->validate([
    //         'reference_number' => 'required|numeric',
    //         'stop_count' => 'required|numeric|min:0|max:10',
    //         'starting_date' => 'required|date|date_format:Y-m-d',
    //         'status' => 'required|numeric',
    //         'position' => 'numeric',
    //         'stops' => '',
    //         // 'stops.*' => 'numeric',
    //         // 'stops.*' => 'exists:App\Warehouse,id',
    //     ], [
    //         'reference_number.required' => '<span class="font-extrabold">Missing Reference Number</span>.<br>This can be found on your FirstFleet app or the paperwork.',
    //         'reference_number.numeric' => '<span class="font-extrabold">Invalid Reference Number</span>.<br>The Reference Number can only contain numbers.',
    //         // 'reference_number.regex' => 'Invalid <span class="font-extrabold">Reference Number</span>.<br>Check and make sure you type it correctly.',
    //         'reference_number.exists' => '<span class="font-extrabold">Reference Number</span> doesn\'t exists.<br>That Reference Number does not exist.',
    //         // 'stops.*.required' => '<span class="font-extrabold">Missing Stop</span><br>The following stop has a missing location.',
    //         // 'stops.*.exists' => '<span class="font-extrabold">Missing or Invalid Stop</span><br>The following stop has a missing or invalid location.',
    //     ]);

    //     $dispatch->update([
    //         'reference_number' => $data['reference_number'],
    //         'stop_count' => $data['stop_count'],
    //         'starting_date' => $data['starting_date'],
    //         'status_id' => $data['status'],
    //         'stop_count' => $data['stop_count'],
    //     ]);

    //     foreach ($data['stops'] as $key => $stop) {
    //         if (isset($stop['tray_count'])) {
    //             $data['stops'][$key]['roll_offs'] = $stop['tray_count'];
    //             $data['stops'][$key]['pack_outs'] = $stop['tray_count'];
    //         }

    //         if (!isset($stop['different'])) {
    //             $data['stops'][$key]['different'] = 'off';
    //         }
    //     }

    //     $stops = collect($data['stops'])->whereNotNull('warehouse_id')->keyBy('warehouse_id')->transform(function ($key) {
    //         unset($key['warehouse_id']);
    //         return $key;
    //     });

    //     $stops = collect($data['stops'])->whereNotNull('warehouse_id')->keyBy('warehouse_id')->transform(function ($key) {
    //         unset($key['warehouse_id']);
    //         return $key;
    //     });

    //     $dispatch->stops()->sync($stops);

    //     return redirect('./dispatch/' . $data['reference_number'])->with('success', 'This dispatch has been updated.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     return 'destroy';
    // }
}
