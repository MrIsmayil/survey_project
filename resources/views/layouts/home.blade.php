<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (isset($title))
            {{ $title }}
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <header class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-5">
            <nav class="flex justify-end py-2">
                @auth
                    <div class="auth-block flex justify-end gap-3 w-[50%] text-sm">
                        <a href="#" class="login-button">{{ Auth::user()->name }}</a>
                        @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin.home.index') }}" class="login-button">Админ панель</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="login-button inline-flex items-center justify-center">
                                <div>Выход</div>
                            </button>

                        </form>


                    </div>
                    <!-- <div class="hidden sm:flex sm:items-center sm:ml-6">
                                                    <x-dropdown align="right" width="48">
                                                        <x-slot name="trigger">
                                                            <button class="login-button inline-flex items-center justify-center">
                                                                <div>{{ Auth::user()->name }}</div>

                                                                <div class="ml-1">
                                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </x-slot>

                                                        <x-slot name="content">

                                                            <form method="POST" action="{{ route('logout') }}">
                                                                @csrf

                                                                <x-dropdown-link :href="route('logout')"
                                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                                    {{ __('Выход') }}
                                                                </x-dropdown-link>
                                                            </form>
                                                        </x-slot>
                                                    </x-dropdown>
                                                </div> -->
                @else
                    <div class="auth-block flex gap-3">
                        <a href="{{ route('register') }}" class="login-button">Регистрация</a>
                        <a href="{{ route('login') }}" class="login-button">Вход</a>
                    </div>
                @endauth

            </nav>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
