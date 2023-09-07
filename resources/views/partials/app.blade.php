<!DOCTYPE html>
<html lang="en" data-sidebar-color="dark" data-topbar-color="light" data-sidebar-view="default">

<head>
    <meta charset="utf-8">
    <title>@yield('pagename') | {{ env('APP_NAME') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="MyraStudio" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('') }}assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Head Js -->
    <script src="{{ asset('') }}assets/js/head.js"></script>
</head>

<body>

    <div class="app-wrapper">
        @include('partials/sidebar');
        <div class="app-content">

            <!-- Topbar Start -->
            <header class="app-header flex items-center px-5 gap-4">

                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="logo-box">
                    <img src="{{ asset('') }}assets/images/logo-sm.png" class="h-6" alt="Small logo">
                </a>

                <!-- Sidenav Menu Toggle Button -->
                <button id="button-toggle-menu" class="nav-link p-2 waves-effect me-auto">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center h-6 w-6">
                        <i class="ph ph-list text-2xl"></i>
                    </span>
                </button>

                <!-- Topbar Search -->
             <!--   <div class="md:flex hidden items-center relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="ph ph-magnifying-glass text-base"></i>
                    </div>
                    <input type="search" class="form-input px-8 rounded-full  bg-gray-500/10 border-transparent focus:border-transparent" placeholder="Search...">
                    <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                        <i class="ph ph-microphone text-base hover:text-black"></i>
                    </button>
                </div> -->



                <!-- Fullscreen Toggle Button -->
                <div class="md:flex hidden">
                    <button data-toggle="fullscreen" type="button" class="nav-link p-2 waves-effect">
                        <span class="sr-only">Fullscreen Mode</span>
                        <span class="flex items-center justify-center h-6 w-6">
                            <i class="ph ph-arrows-out text-2xl"></i>
                        </span>
                    </button>
                </div>

                <!-- Profile Dropdown Button -->
                <div class="relative">
                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link flex items-center gap-2.5 waves-effect p-2">
                        <img src="{{ asset('') }}assets/images/users/avatar-6.jpg" alt="user-image" class="rounded-full h-8 w-8">
                        <span class="md:flex items-center hidden">
                            <span class="font-medium text-base">{{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}</span>
                            <i class='ph ph-chevron-down'></i>
                        </span>
                    </button>
                    <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-40 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2">

                        <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100" href="#">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 cursor-pointer" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>

                    </div>
                </div>
            </header>
            <!-- Topbar End -->
            @if(session('success'))

            <div class="bg-success/25 text-success text-sm rounded-md p-3" role="alert">
                <span class="font-bold">Success</span> {{ session('success') }}
            </div>
            @endif

            @if(session('error'))

            <div class="bg-danger/25 text-danger text-sm rounded-md p-3" role="alert">
                <span class="font-bold">Error</span> {{ session('error') }}
            </div>
            @endif


            @yield('content')

            <!-- Footer Start -->
            <footer class="footer h-16 flex items-center px-6 bg-white border-t border-gray-200 mt-auto">
                <div class="flex md:justify-between justify-center w-full gap-4">
                    <div>
                        <p class="text-sm font-medium">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © {{ env('APP_NAME') }}
                        </p>
                    </div>
                    <div class="md:flex hidden gap-2 item-center md:justify-end">
                        <p class="text-sm font-medium">Design &amp; Develop by <a href="#" class="text-primary">BetaCode</a></p>
                    </div>
                </div>
            </footer>
            <!-- Footer End -->

        </div>

        <!-- Plugin Js -->

        <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('') }}assets/libs/@frostui/tailwindcss/frostui.js"></script>

        <!-- App Js -->
        <script src="{{ asset('') }}assets/js/app.js"></script>

        <!-- Apexcharts js -->
        <script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Morris Js-->
        <script src="{{ asset('') }}assets/libs/morris.js/morris.min.js"></script>

        <!-- Raphael Js-->
        <script src="{{ asset('') }}assets/libs/raphael/raphael.min.js"></script>

        <!-- Dashboard Project Page js -->
        <script src="{{ asset('') }}assets/js/pages/dashboard.js"></script>

</body>

</html>