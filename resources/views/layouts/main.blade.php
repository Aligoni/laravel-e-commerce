<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        .app-background {
            background-image: url('/images/another.jpg');
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .mobile-dropdown {
            height: 0;
        }

        .animate {
            height: 100%;
        }

        .product-card {
            width: 40%;
            margin: 5%;
            border-radius: 0.25rem;
        }
        
        .product-card img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: auto;
            max-height: 100%;
            max-width: 100%;
        }

        @media screen and (min-width: 600px) {
            .product-card {
                width: 20%;
                margin: 2.5%;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative hidden flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

    </div>
    <div class="flex flex-col min-h-screen w-screen relative">
        <div x-data="{ open: false }" class="z-10 fixed inset-x-0 top-0">
            <div class="flex justify-between py-4 px-8 md:px-20 items-center bg-white shadow-md">
                <img src="/images/app-logo.png" alt="" class="w-32 h-14">
                <nav class="flex justify-evenly">
                    <a href="{{ route('products') }}" class="mx-4">
                        <p class="hidden md:inline text-xl text-gray-700 font-bold hover:text-blue-500">Products</p>
                    </a>
                    <a href="" class="mx-4">
                        <p class="hidden md:inline text-xl text-gray-700 font-bold hover:text-blue-500">Cart</p>
                    </a>

                    <!-- Hamburger -->
                    @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-xl text-gray-700 font-bold hover:text-blue-500 hover:border-blue-300 focus:outline-none focus:text-blue-700 focus:border-blue-300">
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
                                <!-- Authentication -->
                                <x-dropdown-link :href="route('logout')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="mx-4 hidden sm:inline">
                        <p class="text-xl text-gray-700 font-bold hover:text-blue-500">Login</p>
                    </a>
                    @endauth
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </nav>
            </div>
            <div :class="{'block': open, 'hidden': ! open, 'animate': open}"
                class="hidden mobile-dropdown sm:hidden bg-white">

                <!-- Responsive Settings Options -->
                <div class="border-t border-gray-200">
                    @auth
                    <div class="p-5 border-b border-gray-300">
                        <div class="font-medium text-lg text-gray-800">Logged in as:</div>
                        <div class="font-medium text-lg text-gray-800">{{ Auth::user()->name }}</div>
                        {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
                    </div>
                    @endauth
                    <div class="py-3 space-y-1 border-b border-gray-300">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('/')">
                            {{ __('Home') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="py-3 space-y-1 border-b border-gray-300">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Products') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="py-3 space-y-1 border-b border-gray-300">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Cart') }}
                        </x-responsive-nav-link>
                    </div>
                    @auth
                    <div class="py-3 space-y-1 border-b border-gray-300">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="py-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                    @else
                    <div class="py-3 space-y-1 border-b border-gray-300">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        
        @yield('content')
    </div>
</body>

</html>