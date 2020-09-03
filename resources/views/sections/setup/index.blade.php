@extends('layouts.app')

@section('auth')
<div id="verify">
    <section class="h-full flex items-center justify-center">
        <div class="w-full max-w-xs">
            <div class="text-center text-white text-5xl font-extrabold mb-4">
                <a href="/">{{config('app.name')}}</a>
            </div>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('setup.update')}}" method="POST">
                @csrf
                <div class="mb-4 text-center">
                    <p class="text-xl text-gray-700 font-extrabold">Welcome!</p>
                    <p class="text-xs text-gray-500">Thank you for creating an account!</p>
                </div>
                <hr class="mb-4">
                @if (session('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center mb-4" role="alert">
                    <span class="font-semibold text-xs">{{session('message')}}</span>
                </div>
                @endif
                @if(count($errors) > 0)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mb-4" role="alert">
                    <span class="font-semibold text-xs">{{$errors->first()}}</span>
                </div>
                @endif
                <div class="text-sm">
                    <p class="mb-4 text-center">
                        Because everyone is a little different, we need a little information to tailor {{config('app.name')}} to your specific needs.
                    </p>

                    <hr class="mb-4">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            First Name
                        </label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline capitalize @error('name') border-red-600 @enderror" id="name" name="name" type="text" placeholder="John" value="{{ old('name') }}">
                        <span class="text-gray-500 text-xs italic">
                            We need your name to personalize your dashboard.
                        </span>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hire_date">
                            When did you start with FirstFleet?
                        </label>
                        <input name="hire_date" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline capitalize @error('hire_date') border-red-600 @enderror" type="month" value="{{ old('hire_date') ?? date('Y-m') }}">
                        <span class="text-gray-500 text-xs italic">
                            We need your hire date to properly calculate your rates.
                        </span>
                    </div>
                    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Continue
                    </button>

                </div>
            </form>
        </div>
    </section>
</div>
@endsection