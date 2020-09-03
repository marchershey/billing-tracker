@extends('layouts.app')

@section('header', true)
@section('sidebar', true)

@section('content')
<div class="container px-6">
    <form class="w-full md:max-w-xl mx-auto" action="{{ route('drivers.profile.settings.post') }}" method="POST">
        @csrf
        <div class="flex justify-between items-center bg-gray-200 my-6">
            <h2 class="text-2xl font-semibold text-gray-700 capitalize">
                Settings
            </h2>
            <button type="submit" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save
            </button>

        </div>

        @include('layouts.alerts')

        <div class="flex flex-wrap mb-6 w-full bg-white p-0 rounded">
            <h1 class="text-lg font-semibold px-4 py-2 w-full">Dashboard</h1>
            <hr class="mb-2 w-full mx-4">
            <table class="table-auto w-full">
                <tbody>
                    <tr>
                        <td class="px-4 py-2 font-semibold">
                            <span class="block font-semibold">Dispatch Count</span>
                            <span class="block text-xs text-gray-400 italic leading-tight">
                                How many dispatches should we display on your dashboard?
                            </span>
                        </td>
                        <td class="px-4 py-2 text-right">
                            <input type="tel" name="dispatch_count" class="appearance-none bg-gray-200 text-gray-700 border border-gray-200 rounded py-1 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-10 text-center" value="{{$settings->dispatch_count}}">
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-semibold bg-gray-100">
                            <span class="block font-semibold">Date Verbiage</span>
                            <span class="block text-xs text-gray-400 italic leading-tight">
                                The dates in your 'recent dispatches' will be formatted in verbiage terms (e.g. 'Today', or 'Last Week').
                            </span>
                        </td>
                        <td class="px-4 py-2 text-right bg-gray-100">
                            <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                                <input type="checkbox" name="date_verbiage" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer checked:right-0 checked:border-blue-500 focus:outline-none" {{$settings->date_verbiage ? 'checked' : ''}} />
                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </form>

</div>

@endsection