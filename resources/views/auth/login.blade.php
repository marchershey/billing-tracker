@extends('layouts.app')

@section('auth')
<div id="login" class="py-5 min-h-full">
    <section class="h-full flex items-center justify-center">
        <div class="w-full">
            <div class="text-center text-white text-5xl font-extrabold mb-4">
                <a href="/">{{config('app.name')}}</a>
            </div>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4 text-center">
                    <p class="text-xl text-gray-700 font-extrabold">Welcome back!</p>
                    <p class="text-xs text-gray-500">Sign into your account below.</p>
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
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email Address
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-1 @error('email') border-red-600 @enderror" id="email" name="email" type="text" placeholder="john@email.com" value="{{ old('email') }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-1 @error('password') border-red-600 @enderror" id="password" name="password" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                </div>
                <div class="mb-4">
                    <label class="inline-flex items-center" for="remember">
                        <input type="checkbox" class="form-checkbox shadow text-blue-500" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-xs text-gray-600 mb-px">Keep me signed in on this device forever</span>
                    </label>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign in
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                        Reset Password
                    </a>
                </div>
            </form>
            <div class="text-center text-gray-700 text-xs">
                <p>Don't have an account? <a href="/register" class="text-gray-600">Create one</a> for free.</p>
            </div>
        </div>
    </section>
</div>
@endsection