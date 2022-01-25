@extends('layouts.default')

@section('content')

    <header>
        <a href="#">
            <img src="{{ asset('/img/logo.png') }}" alt="logo" class="logo">
        </a>
        <ul class="navigation">
            <li><a href="#">Home</a></li>
            <li><a href="#">Fotos</a></li>
            <li><a href="#programacao">Programação</a></li>
            <li><a href="#contato">Contato</a></li>
{{--                <li><a href="{{ route('login') }}">Login</a></li>--}}
        </ul>
    </header>

{{--    <div--}}
{{--        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}
{{--        @if (Route::has('login'))--}}
{{--            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--                @auth--}}
{{--                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>--}}
{{--                @else--}}
{{--                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}"--}}
{{--                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--        @endif--}}

{{--    </div>--}}
@endsection
