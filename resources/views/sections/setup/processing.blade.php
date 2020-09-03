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
                    <p class="text-xl text-gray-700 font-extrabold">Creating Account</p>
                    <p class="text-xs text-gray-500">Sit tight, it should only take a second.</p>
                </div>
                <hr class="mb-4">
                <div class="text-sm">
                    <p class="text-center">
                        The system is creating your account.
                    </p>
                    <p class="mb-4 text-center">
                        This should only a few seconds...
                    </p>
                    <p class="mb-4 text-center text-6xl">
                        <i class="fas fa-cog fa-spin"></i>
                    </p>
                    <p class="mb-4 text-center text-xs italic text-gray-400">
                        The page will refresh once completed.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script>
    setTimeout(function(){ location.replace("{{route('index')}}"); }, 2000);
</script>
@endpush