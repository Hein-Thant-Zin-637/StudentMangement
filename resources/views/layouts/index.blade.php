<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/f1dd83d39c.js" crossorigin="anonymous"></script>

    <title>Admin Dashboard Panel</title>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')


        <nav>
            <div class="logo-name m-0 p-0">
                <div class="d-flex flex-column justify-content-center">
                    <span id="title" class="logo_name text-center">Student <br> Mangement</span>
                </div>
            </div>

            <div class="menu-items">
                <ul class="nav-links p-3">
                    <li><a href="{{route('dashboard')}}">
                            <i class="fa-solid fa-gauge-high"></i>  
                            <span class="link-name">Dahsboard</span>
                        </a></li>
                    <li><a href="{{route('course.index')}}">
                            <i class="uil uil-files-landscapes"></i>
                            <span class="link-name">Course</span>
                        </a></li>
                    <li><a href="{{route('batch.index')}}">
                            <i class="fa-solid fa-square-poll-vertical"></i>
                            <span class="link-name">Batches</span>
                        </a></li>
                    <li><a href="{{route('teacher.index')}}">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span class="link-name">Teacher</span>
                        </a></li>
                    <li><a href="{{route('student.index')}}">
                            <i class="fa-solid fa-user"></i>
                            <span class="link-name">Students</span>
                        </a></li>
                    <li><a href="{{route('enrollement.index')}}">
                            <i class="fa-regular fa-file-lines"></i>
                            <span class="link-name">Enrollement</span>
                        </a></li>
                    <li><a href="{{route('payment.index')}}">
                            <i class="fa-regular fa-credit-card"></i>
                            <span class="link-name">Payment</span>
                        </a></li>
                </ul>

                <ul class="logout-mode p-3">
                    <li><a href="#">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">Logout</span>
                        </a></li>

                    <li class="mode">
                        <a href="#">
                            <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span>
                        </a>

                        <div class="mode-toggle">
                            <span class="switch"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <section class="dashboard">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle"></i>

                <div class="search-box">
                    <i class="uil uil-search "></i>
                    <input type="text" placeholder="Search here...">
                </div>

                <div class="hidden  sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md  logout-profile dark:text-gray-400  dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>


            <!-- Page Content -->
            <main class="dash-content mt-5 p-3">
                @yield('content')
            </main>
        </section>
    </div>


    <script src="/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>