<!DOCTYPE html>
<html lang="en" data-sidebar-color="dark" data-topbar-color="light" data-sidebar-view="default">

<head>
    <meta charset="utf-8">
    <title>Register | {{ env('APP_NAME') }}</title>
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
                <a href="index.html" class="flex justify-center mb-8">
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
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="mb-2" for="first_name">First Name</label>
                        <input id="first_name" name="first_name" class="form-input" type="text" placeholder="Enter your first name" required>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2" for="last_name">Last Name</label>
                        <input id="last_name" name="last_name" class="form-input" type="text" placeholder="Enter your last name" required>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2" for="mobile_number">Mobile Number</label>
                        <input id="mobile_number" name="mobile_number" class="form-input" type="text" placeholder="Enter your mobile number" required>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2" for="address">Address</label>
                        <input id="address" name="address" class="form-input" type="text" placeholder="Enter your address" required>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2" for="email">Email Address</label>
                        <input id="email" name="email" class="form-input" type="email" placeholder="Enter your email" required>
                    </div>

                    

                    <div class="mb-4">
                        <label class="mb-2" for="password">Password</label>
                        <input id="password" name="password" class="form-input" type="text" placeholder="Enter your password" required>
                    </div>

                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin" required>
                        <label class="ms-2" for="checkbox-signin">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                    </div>

                    <div class="flex justify-center mb-3">
                        <button class="btn w-full text-white bg-primary"> Sign Up Free </button>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-white text-center mt-8">Already have an account ?<a href="{{ url('/') }}" class="font-medium ms-1">Sign In</a></p>
    </div>
</body>

</html>