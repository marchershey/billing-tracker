@extends('layouts.app')

@section('header', true)
@section('sidebar', true)

@section('content')
<div class="container px-6 mx-auto">
    <form id="dispatch-show" class="w-full md:max-w-xl mx-auto" action="{{ route('drivers.dispatch.show.post', $dispatch->reference_number) }}" method="POST" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="flex justify-between items-center bg-gray-200 my-6">
            <h2 class="text-2xl font-semibold text-gray-700">
                Dispatch #{{$dispatch->reference_number}}
            </h2>
            <button type="submit" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update
            </button>

        </div>

        @include('layouts.alerts')

        <div class="flex flex-wrap w-full bg-white mb-6 p-4 pb-0 rounded">
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Reference Number
                </label>
                <input name="reference_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="9380633" value="{{$dispatch->reference_number}}">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Stop Count
                </label>
                <input name="stop_count" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 uppercase" type="number" value="{{$dispatch->stop_count}}" min="1" max="10">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Starting Date
                </label>
                <input name="starting_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" type="date" value="{{ $dispatch->starting_date }}">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Status
                </label>
                <div class="relative">
                    <select name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}" {{ (old('status') == $status->id || $status->driver_default) ? 'selected' : '' }}>{{$status->name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>

        </div>
        @if($dispatch->stop_count > 1)
        <div class="flex items-center justify-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mb-6" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
            <p>Since you have {{$dispatch->stop_count}} stops, the system has automatically added {{$dispatch->stop_count - 1}} Stop Pay(s).</p>
        </div>
        @endif

        @for ($i = 0; $i < $dispatch->stop_count; $i++)
            <div class="flex flex-wrap w-full bg-white mb-6 p-4 pb-0 rounded">
                <div class="w-full md:w-1/2 px-3 mb-6">

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Stop #{{$i + 1}}
                    </label>
                    <div class="relative">
                        <input type="hidden" name="stops[{{$i}}][warehouse_id]" class="stop" value="{{$dispatch->stops[$i]->pivot->warehouse_id ?? ''}}">
                        <input type="hidden" name="stops[{{$i}}][position]" class="position" value="{{$i}}">
                        <input class="stop-input appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('stops.' . $i) border-red-600 @enderror" type="text" placeholder="Start typing city name..." value="{{$dispatch->stops[$i]->name ?? ''}}" autocomplete="off">
                        <div class="stop-loading pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700" style="display: none">
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                        <div class="absolute stop-results-container -mt-1 bg-white w-full z-10 border border-gray-500" style="display: none">
                            <div class="stop-no-results block p-2 border-b hover:bg-gray-100 cursor-pointer" style="display: none">
                                <h1 class="text-sm font-semibold">
                                    No results found.
                                </h1>
                                {{-- <div class="text-center">
                                    <div class="mb-3">
                                        No warehouses with that name found.
                                    </div>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                        Create one
                                    </button>
                                </div> --}}
                            </div>
                            <div class="stop-item-list border-t" style="display: none"></div>
                        </div>
                    </div>
                </div>

                <div class="stop-type w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Type of Stop
                    </label>
                    <div class="relative">
                        <select name="stops[{{$i}}][type_id]" class="stop-type-selection block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value=""></option>
                            @foreach($stopTypes as $key=>$type)
                            <option value="{{$type->id}}" {{ ($dispatch->stops[$i]->pivot->type_id ?? '') == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

                <div class="stop-data-group flex flex-wrap w-full">
                    <input type="hidden" class="stop-type" value="">

                    <div class="stop-data miles w-1/2 md:w-1/3 px-3 mb-6 flex flex-wrap" style="display: none">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Estimated Miles
                        </label>
                        <div class="relative group">
                            <input name="stops[{{$i}}][miles]" class="stop-data-input appearance-none inline w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 pr-16 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="" value="{{$dispatch->stops[$i]->pivot->miles ?? '0'}}" disabled>
                            <div class="stop-data-rate absolute inset-y-0 right-0 flex items-center px-2 text-xs">
                                $0.00
                            </div>
                            <input type="hidden" class="stop-data-type" value="miles" />
                        </div>
                    </div>

                    <div class="stop-data drophook w-1/2 md:w-1/3 px-3 mb-6" style="display: none">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Drop & Hooks
                        </label>
                        <div class="relative">
                            <input name="stops[{{$i}}][drop_hooks]" class="stop-data-input appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 pr-16 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="" value="{{$dispatch->stops[$i]->pivot->drop_hooks ?? '0'}}" disabled>
                            <div class="stop-data-rate absolute inset-y-0 right-0 flex items-center px-2 text-xs">
                                $0.00
                            </div>
                            <input type="hidden" class="stop-data-type" value="drops" />
                        </div>
                    </div>

                    <div class="stop-data tray w-1/2 md:w-1/3 px-3 mb-6" style="display: none">
                        <label class="tray-count-label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Tray Count
                        </label>
                        <div class="relative">
                            <input name="stops[{{$i}}][tray_count]" class="stop-data-input appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 pr-16 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="" value="{{$dispatch->stops[$i]->pivot->tray_count ?? '0'}}" disabled>
                            <div class="stop-data-rate absolute inset-y-0 right-0 flex items-center px-2 text-xs">
                                $0.00
                            </div>
                            <input type="hidden" class="stop-data-type" value="tray" />
                        </div>
                    </div>

                    <div class="stop-data rolloff w-1/2 md:w-1/3 px-3 mb-6" style="display: none">
                        <label class="tray-count-label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Roll-Off Count
                        </label>
                        <div class="relative">
                            <input name="stops[{{$i}}][roll_offs]" class="stop-data-input appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 pr-16 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="" value="{{$dispatch->stops[$i]->pivot->roll_offs ?? '0'}}" disabled>
                            <div class="stop-data-rate absolute inset-y-0 right-0 flex items-center px-2 text-xs">
                                $0.00
                            </div>
                            <input type="hidden" class="stop-data-type" value="rolloff" />
                        </div>
                    </div>

                    <div class="stop-data packout w-1/2 md:w-1/3 px-3 mb-6" style="display: none">
                        <label class="tray-count-label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Pack-Out Count
                        </label>
                        <div class="relative">
                            <input name="stops[{{$i}}][pack_outs]" class="stop-data-input appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 pr-16 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="" value="{{$dispatch->stops[$i]->pivot->pack_outs ?? '0'}}" disabled>
                            <div class="stop-data-rate absolute inset-y-0 right-0 flex items-center px-2 text-xs">
                                $0.00
                            </div>
                            <input type="hidden" class="stop-data-type" value="packout" />
                        </div>
                    </div>

                    <div class="stop-data different w-full px-3 mb-6" style="display: none">
                        <label class="different-div w-full">
                            <input type="checkbox" class="different-checkbox form-checkbox shadow text-blue-500" name="stops[{{$i}}][different]" {{ (($dispatch->stops[$i]->pivot->different ?? '') == 'on') ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600 mb-px">Roll-off & Pack-out count are different.</span>
                        </label>
                    </div>
                </div>
            </div>
            @endfor
    </form>
</div>
@endsection