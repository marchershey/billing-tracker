@extends('layouts.app')

@section('header', true)
@section('sidebar', true)

@section('content')
<div class="container px-6 mx-auto">
    <div class="flex flex-wrap justify-between items-center bg-gray-200 my-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 sm:mb-0">
                Your Pay Rates
            </h2>
        </div>
        <div class="flex items-center justify-center bg-blue-500 text-white text-sm font-bold px-4 py-3 w-full sm:w-auto" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
            <p>You've been with FirstFleet for {{$rates->months ?? 'unknown'}} months.</p>
        </div>
    </div>

    @if(count(Auth::user()->rates()->get()) > 0)
    <div class="grid gap-3 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Mileage
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->mileage, 3)}} <span class="text-sm text-gray-500">per mile</span>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Roll Off
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->roll_off, 4)}} <span class="text-sm text-gray-500">per tray</span>
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Pack Out
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->pack_out, 4)}} <span class="text-sm text-gray-500">per tray</span>
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Hourly Rate
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->hourly, 2)}} <span class="text-sm text-gray-500">per hour</span>
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Stop Pay
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->stop_pay, 2)}} <span class="text-sm text-gray-500">per extra stop</span>
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Drop & Hook Pay
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->drop_hook, 2)}} <span class="text-sm text-gray-500">per drop & hook</span>
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Pallet Pay
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->pallet, 2)}} <span class="text-sm text-gray-500">per pallet</span>
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div>
                <p class="mb-2 text-base font-medium text-gray-600">
                    Stale Pay
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    ${{number_format($rates->stale, 2)}} <span class="text-sm text-gray-500">per stop</span>
                </p>
            </div>
        </div>
    </div>

    @else
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded w-full" role="alert">
        <strong class="font-bold">Hold up!</strong>
        <span class="block sm:inline">Your account is still being processed.. please wait a few moments for your rates to generate.</span>
    </div>
    @endif

</div>

@endsection