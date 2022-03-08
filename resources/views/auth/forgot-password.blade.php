{{--<x-guest-layout>--}}
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Font Awesome -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
        />
        <!-- MDB -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
            rel="stylesheet"
        />

        <title>Precision Desk | Forgot Password</title>
        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }

            .h-custom {
                height: calc(100% - 73px);
            }

            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }
            .l-bg-cherry {
                background: linear-gradient(to right, #0d47a1, #8d188e) !important;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                         class="img-fluid"
                         alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="divider d-flex align-items-center my-4">
                            <p class="lead fw-normal mb-0 me-3"><strong>Trouble Logging In?</strong>
                            </p>
                        </div>


                        <x-jet-validation-errors class="mb-4"></x-jet-validation-errors>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <blockquote class="blockquote" style="text-align: justify">
                            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </blockquote>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0"><strong></strong></p>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                   placeholder="Enter a valid email address" name="email" :value="old('email')" required
                                   autofocus/>
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn l-bg-cherry btn-rounded btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                <strong>{{ __('Send Password Reset Link') }}</strong>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 l-bg-cherry">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <span class="text-white"> <strong>Powered By <a href="http://tierdata.co.ke" class="text-white"
                                                                target="_blank">Tier Data Ltd</a>.</strong></span>&nbsp
                &nbsp
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>


            </div>

            <!-- Right -->
        </div>
    </section>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
    ></script>
    </body>
    </html>
{{--</x-guest-layout>--}}




