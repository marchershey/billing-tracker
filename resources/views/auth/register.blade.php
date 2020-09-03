@extends('layouts.app')

@section('auth')
<div id="register" class="py-5 min-h-full">
    <section class="h-full flex items-center justify-center">
        <div class="w-full">
            <div class="text-center text-white text-5xl font-extrabold mb-4">
                <a href="/">{{config('app.name')}}</a>
            </div>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4 text-center">
                    <p class="text-xl text-gray-700 font-extrabold">Create a new account</p>
                </div>
                <hr class="mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email Address
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-1 @error('email') border-red-600 @enderror" id="email" name="email" type="text" placeholder="john@email.com" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs italic ml-1">{!!$message!!}</p>
                    @else
                    <p class="text-gray-500 text-xs italic ml-1">You'll need to verify your email.</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-1 @error('password') border-red-600 @enderror" id="password" name="password" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    @error('password')
                    <p class="text-red-500 text-xs italic ml-1">{{$message}}</p>
                    @else
                    <p class="text-gray-500 text-xs italic ml-1">Passwords must be at least 6 characters</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Confirm Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-1 @error('password') border-red-600 @enderror" id="password" name="password_confirmation" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    <p class="text-gray-500 text-xs italic ml-1">Type it again just one more time.</p>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Create Account
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/login">
                        Sign in
                    </a>
                </div>
            </form>
            <div class="text-center text-gray-700 text-xs">
                <p>By creating an account<br>you agree to the <a href="#" class="text-gray-600">Terms of Service</a>.</p>
            </div>
        </div>
    </section>
</div>
@endsection