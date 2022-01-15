<div>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SkyDash | Home</title>
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e, #f09) !important;
                color: #fff;
            }
        </style>

    </head>
    <body>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                             data-ride="carousel">

                            <button type="button" class="btn btn-outline-info btn-sm  btn-icon-text float-right"
                                    style="margin-right: 8px">
                                Print
                                <i class="ti-printer btn-icon-append"></i>
                            </button>

                            <button type="button" class="btn btn-outline-dribbble btn-sm  btn-icon-text float-right"
                                    style="margin-right: 8px" data-toggle="modal" data-target="#exampleModal">
                                PDF
                                <i class="ti-download btn-icon-append"></i>
                            </button>
                            <br>
                            <br>
                            <hr class="border border-primary">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-md-12 border-right border-primary">
                                                    <blockquote class="blockquote blockquote-info">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <h3 class="font-weight-500 mb-xl-4 text-info"
                                                                style="font-size: medium">My No. of Tickets per
                                                                Status</h3>
                                                        </div>
                                                        <div style="overflow-x: scroll">
                                                            <div style="width: 200px; height: 500px">
                                                                {!! $chart1->container() !!}
                                                            </div>
                                                        </div>
                                                    </blockquote>

                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </body>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! $chart1->script() !!}
    </html>

</div>
