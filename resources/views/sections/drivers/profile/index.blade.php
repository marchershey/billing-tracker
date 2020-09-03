@extends('layouts.app')

@section('header', true)
@section('sidebar', true)

@section('content')
<div class="container px-6">
    <form class="w-full md:max-w-xl mx-auto" action="{{ route('drivers.profile.index.post') }}" method="POST">
        @csrf
        <div class="flex justify-between items-center bg-gray-200 my-6">
            <h2 class="text-2xl font-semibold text-gray-700 capitalize">
                Your Profile
            </h2>
            <button type="submit" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update
            </button>

        </div>

        @include('layouts.alerts')

        <div class="flex flex-wrap mb-6 w-full bg-white p-4 pb-0 rounded">
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Name
                </label>
                <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 capitalize" type="text" placeholder="Name" value="{{old('name') ?? Auth::user()->name}}">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Email
                </label>
                <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" value="{{old('email') ?? Auth::user()->email}}">
                <p class="text-xs text-gray-500 italic">You'll need to re-verify if you change this.</p>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Hire Date
                </label>
                <input name="hire_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" type="month" value="{{ old('hire_date') ?? Auth::user()->hire_date }}">
                <p class="text-xs text-gray-500 italic">Changing this will change your rates.</p>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Password
                </label>
                <a href="{{route('drivers.profile.password')}}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                    Change Password
                </a>
            </div>
        </div>
    </form>

</div>

@endsection