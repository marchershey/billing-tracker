@extends('layouts.app')

@section('hide-header', true)

@push('css')
<style>
    header {
        background: url('https://images.unsplash.com/photo-1592805144716-feeccccef5ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80');
    }
</style>
@endpush

@section('content')
<nav id="nav" class="fixed inset-x-0 top-0 flex flex-row justify-between z-10 text-white bg-transparent">

    <div class="p-4">
        <div class="font-extrabold tracking-widest text-xl">
            <a href="#" class="transition duration-300 hover:text-orange-600 uppercase">
                {{ config('app.name') }}
            </a>
        </div>
    </div>

    <div class="p-4 hidden md:flex flex-row justify-between font-bold">
        <a id="hide-after-click" href="#about" class="mx-4 text-lg  border-b-2 border-transparent hover:border-b-2 hover:border-orange-600 transition duration-300">
            About
        </a>
        <a href="#whyus" class="mx-4 text-lg border-b-2 border-transparent hover:border-b-2 hover:border-orange-600 transition duration-300">
            Why Us ?
        </a>
        <a href="#showcase" class="mx-4 text-lg border-b-2 border-transparent hover:border-b-2 hover:border-orange-600 transition duration-300">
            Our Products
        </a>
    </div>

    <div id="nav-open" class="p-4 md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </div>
</nav>

<div id="nav-opened" class="fixed left-0 right-0 hidden bg-white mx-2 mt-16 rounded-br rounded-bl shadow z-10">
    <div class="p-2 divide-y divide-gray-600 flex flex-col">
        <a href="#about" class="p-2 font-semibold hover:text-orange-700">About</a>
        <a href="#whyus" class="p-2 font-semibold hover:text-orange-700">Why Us ?</a>
        <a href="#showcase" class="p-2 font-semibold hover:text-orange-700">Our Products</a>
    </div>
</div>

<header class="bg-center bg-fixed bg-no-repeat bg-center bg-cover h-full relative ">
    <div class="h-full bg-opacity-50 bg-black flex items-center justify-center" style="background:rgba(0,0,0,0.5);">
        <div class="mx-2 mt-5 text-center max-w-md">
            <h1 class="text-gray-200 font-extrabold text-4xl">{{config('app.name')}}</h1>
            <h1 class="text-gray-200 font-extrabold text-lg mt-5">Your new billing assistant</h1>
            <div class="flex justify-around mt-20">
                <a href="/login" class="text-gray-200 hover:text-orange-600 font-bold py-2 px-4 inline-flex items-center transition duration-300">
                    <span>Sign in</span>
                </a>
                <a href="/register" class="bg-orange-600 hover:bg-orange-700 text-gray-200 hover:text-gray-400 font-bold py-2 px-4 rounded inline-flex items-center transition duration-300">
                    <span>Create an account</span>
                </a>
            </div>
        </div>
    </div>
</header>
<section class="bg-gray-900">

</section>

@endsection