@extends('layouts.app')

@section('header', true)
@section('sidebar', true)

@section('content')
<div class="container px-6">
    <form class="w-full md:max-w-xl mx-auto" action="{{ route('drivers.profile.password.post') }}" method="POST">
        @csrf
        <div class="flex justify-between items-center bg-gray-200 my-6">
            <h2 class="text-2xl font-semibold text-gray-700 capitalize">
                Change Password
            </h2>
            <button type="submit" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Change
            </button>

        </div>

        @include('layouts.alerts')

        <div class="flex flex-wrap mb-6 w-full bg-white p-4 pb-0 rounded">
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Password
                </label>
                <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 capitalize" type="password" placeholder="" value="">
                <p class="text-xs text-gray-500 italic">Passwords must be at least 6 characters.</p>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Confirm Password
                </label>
                <input name="password_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password">
                <p class="text-xs text-gray-500 italic">Retype your password to confirm.</p>
            </div>
        </div>
    </form>

</div>

@endsection