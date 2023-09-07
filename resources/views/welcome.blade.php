<!DOCTYPE html>
<html lang="en" data-sidebar-color="dark" data-topbar-color="light" data-sidebar-view="default">

<head>
    <meta charset="utf-8">
    <title>Login | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="MyraStudio" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- Head Js -->
    <script src="assets/js/head.js"></script>
</head>

<body class="bg-primary h-screen w-screen flex justify-center items-center">
    <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
        <div class="card overflow-hidden sm:rounded-md rounded-none">
            <div class="px-6 py-8">
                <a href="{{ url('/') }}" class="flex justify-center mb-8">
                    <img class="h-6" src="assets/images/logo-dark.png" alt="">
                </a>
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


                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- CSRF Token -->

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label class="mb-2" for="email">Email Address</label>
                        <input id="email" name="email" class="form-input @error('email') border-red-500 @enderror" type="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <label for="password">Password</label>
                            <a href="{{ route('forgetpass') }}" class="text-sm text-primary">Forget Password ?</a>
                        </div>
                        <input id="password" name="password" class="form-input @error('password') border-red-500 @enderror" type="password" placeholder="Enter your password" required>
                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="form-checkbox rounded" id="remember" name="remember">
                        <label class="ms-2" for="remember">Remember me</label>
                    </div>

                    <!-- Sign In Button -->
                    <div class="flex justify-center mb-3">
                        <button type="submit" class="btn w-full text-white bg-primary"> Sign In </button>
                    </div>
                </form>
            </div>

        </div>

        <p class="text-white text-center mt-8">Create an Account ?<a href="{{ route('register') }}" class="font-medium ms-1">Register</a></p>
    </div>
</body>

</html>