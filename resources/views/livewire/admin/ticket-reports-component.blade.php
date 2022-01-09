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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['line']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Day');
                data.addColumn('number', 'Tier Data');
                data.addColumn('number', 'CCAP');
                data.addColumn('number', 'Pearl Marina');


                data.addRows([
                    [1,  37.8, 80.8, 41.8],
                    [2,  30.9, 69.5, 32.4],
                    [3,  25.4,   57, 25.7],
                    [4,  11.7, 18.8, 10.5],
                    [5,  11.9, 17.6, 10.4],
                    [6,   8.8, 13.6,  7.7],
                    [7,   7.6, 12.3,  9.6],
                    [8,  12.3, 29.2, 10.6],
                    [9,  16.9, 42.9, 14.8],
                    [10, 12.8, 30.9, 11.6],
                    [11,  5.3,  7.9,  4.7],
                    [12,  6.6,  8.4,  5.2],
                    [13,  4.8,  6.3,  3.6],
                    [14,  4.2,  6.2,  3.4]
                ]);

                var options = {
                    chart: {
                        title: 'Centum Entities',
                        subtitle: 'in hundreds'
                    },
                    width: 900,
                    height: 500
                };

                var chart = new google.charts.Line(document.getElementById('linechart_material'));

                chart.draw(data, google.charts.Line.convertOptions(options));
            }
        </script>
    </head>
    <body>
    <div>
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
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <h3 class="font-weight-500 mb-xl-4 text-info"
                                                            style="font-size: medium">Requester Details</h3>
                                                    </div>
                                                    <div style="overflow-x: scroll">
                                                        <div id="linechart_material"
                                                             style="width: 900px; height: 500px"></div>
                                                    </div>

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
    </html>

</div>
