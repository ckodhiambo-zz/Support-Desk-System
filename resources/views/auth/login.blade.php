<x-guest-layout>
    <x-jet-authentication-card>
            <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>SkyDash | Home</title>--}}
{{--    <!-- Plugin css for this page -->--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"--}}
{{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"--}}
{{--          crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">--}}
{{--    <!-- End plugin css for this page -->--}}
{{--    <!-- inject:css -->--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">--}}
{{--    <!-- endinject -->--}}
{{--    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>--}}
{{--</head>--}}

{{--<body>--}}
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}
{{--<div class="container-scroller">--}}
{{--    <div class="container-fluid page-body-wrapper full-page-wrapper">--}}
{{--        <div class="content-wrapper d-flex align-items-center auth px-0">--}}
{{--            <div class="row w-100 mx-0">--}}
{{--                <div class="col-lg-4 mx-auto">--}}
{{--                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">--}}
{{--                        <div class="brand-logo">--}}
{{--                            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">--}}
{{--                        </div>--}}
{{--                        <h4>Hello! let's get started</h4>--}}
{{--                        <h6 class="font-weight-light">Sign in to continue.</h6>--}}
{{--                        <hr>--}}
{{--                        <form class="pt-3">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email Address" name="email" :value="old('email')" required autofocus>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="current-password">--}}
{{--                            </div>--}}
{{--                            <div class="mt-3">--}}
{{--                                <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">{{ __('Sign In') }}</a>--}}
{{--                            </div>--}}
{{--                            <div class="my-2 d-flex justify-content-between align-items-center">--}}
{{--                                <div class="block mt-4">--}}
{{--                                    <label for="remember_me" class="flex items-center">--}}
{{--                                        <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                @if (Route::has('password.request'))--}}
{{--                                <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot your password?') }}</a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="mb-2">--}}
{{--                                <button type="button" class="btn btn-block btn-microsoft auth-form-btn">--}}
{{--                                    <i class="ti-microsoft-alt mr-2"></i>Connect using Outlook--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="text-center mt-4 font-weight-light">--}}
{{--                                Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- content-wrapper ends -->--}}
{{--    </div>--}}
{{--    <!-- page-body-wrapper ends -->--}}
{{--</div>--}}
{{--</form>--}}
{{--<!-- container-scroller -->--}}

{{--<!-- plugins:js -->--}}
{{--<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>--}}
{{--<!-- endinject -->--}}
{{--<!-- Plugin js for this page -->--}}
{{--<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>--}}
{{--<!-- End plugin js for this page -->--}}
{{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}

{{--<script>--}}
{{--    tinymce.init({--}}
{{--        selector: 'textarea#editor',--}}
{{--        menubar: false--}}
{{--    });--}}
{{--</script>--}}
{{--<!-- inject:js -->--}}
{{--<script src="{{ asset('assets/js/off-canvas.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/template.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/settings.js') }}"></script>--}}
{{--<script src="{{ asset('assets/s/todolist.js') }}j"></script>--}}
{{--<!-- endinject -->--}}

{{--<!-- Plugin js for this page -->--}}
{{--<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>--}}
{{--<!-- End plugin js for this page -->--}}
{{--<!-- Custom js for this page-->--}}
{{--<script src="{{ asset('assets/js/file-upload.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/typeahead.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/select2.js') }}"></script>--}}
{{--<!-- End custom js for this page-->--}}
{{--</body>--}}

{{--</html>--}}

