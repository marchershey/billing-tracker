@extends('layouts.app')

@section('auth')
<div id="verify">
    <section class="h-full flex items-center justify-center">
        <div class="w-full max-w-xs">
            <div class="text-center text-white text-5xl font-extrabold mb-4">
                <a href="/">{{config('app.name')}}</a>
            </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4 text-center">
                    <p class="text-xl text-gray-700 font-extrabold">Email Verification</p>
                    <p class="text-xs text-gray-500">You need to verify your email address.</p>
                </div>
                <hr class="mb-4">
                <div class="text-sm">
                    <p class="mb-4 text-center">
                        We just sent a verification link to
                    </p>
                    <p class="mb-4 text-center">
                        <span class="text-base font-semibold bg-gray-200 border border-gray-400 rounded p-2">{{Auth::user()->email}}</span>
                    </p>
                    <p class="mb-4 text-center">
                        Just click the link in that email to complete your registration.
                    </p>
                </div>
                <hr class="mb-4">
                <div class="mb-4 text-gray-500 text-xs text-center">
                    <span class="font-bold">Note:</span> It may take up to 5 mins to arrive.
                </div>
                <div class="mb-4 text-gray-500 text-xs text-center">
                    If you did not receive the verification link or can not find it, double check your spam folder. You can also request a new link to be sent below.
                </div>
                @if (session('resent'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
                    <span class="font-semibold text-xs">A fresh link has been dispatched!</span>
                </div>
                @else
                <form id="sendnewlinkform" class="text-center" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button id="sendnewlinkbutton" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-2 rounded w-full">
                        Send me a new link
                    </button>
                </form>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection