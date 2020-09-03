@extends('layouts.app')

@section('header', true)
@section('sidebar', true)

@section('content')
<div class="container px-6">
    <form class="w-full md:max-w-xl mx-auto" action="{{ route('drivers.dispatch.start.post') }}" method="POST">
        @csrf
        <div class="flex justify-between items-center bg-gray-200 my-6">
            <h2 class="text-2xl font-semibold text-gray-700 ">
                Start a New Dispatch
            </h2>
            <button type="submit" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Start
            </button>

        </div>

        @include('layouts.alerts')

        <div class="flex flex-wrap mb-6 w-full bg-white p-4 pb-0 rounded">
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Reference Number
                </label>
                <input name="reference_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="9380633" value="{{old('reference_number')}}">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Stop Count
                </label>
                <input name="stop_count" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 uppercase" type="number" value="{{old('stop_count') ?? '1'}}" min="1" max="10">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Starting Date
                </label>
                <input name="starting_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" type="date" value="{{ old('starting_date') ?? date('Y-m-d') }}">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Status
                </label>
                <div class="relative">
                    <select name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}" {{ (old('status') == $status->id ?? $status->driver_default == 1) ? 'selected' : '' }}>{{$status->name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-xs text-gray-500 w-full text-center">
            All fields are required.
        </div>
    </form>

</div>

@endsection