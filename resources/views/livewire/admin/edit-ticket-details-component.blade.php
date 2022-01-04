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
                                Change Ticket Status
                                <i class="ti-email btn-icon-append"></i>
                            </button>
                            <br>
                            <br>
                            <hr class="border border-primary">
                            <div class="carousel-inner">
                                <div class="carousel-item active">


                                    <div class="row">
                                        <div class="col-md-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-md-6 border-right border-primary">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <h3 class="font-weight-500 mb-xl-4 text-info"
                                                            style="font-size: medium">Requester Details</h3>
                                                        {{--                                                        <blockquote class="blockquote blockquote-info">--}}
                                                        <table class="table table-borderless report-table">
                                                            <tr>
                                                                <td class="text-muted">Name</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->requester->name }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Company</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">Tier Data Ltd</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Email</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">
                                                                        {{ $ticket->requester->email }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Phone</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">0727497792</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Created at</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->created_at }}</h6>
                                                                </td>

                                                            </tr>
                                                        </table>

                                                        {{--                                                        </blockquote>--}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 border-right">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <h3 class="font-weight-500 mb-xl-4 text-info"
                                                            style="font-size: medium">Ticket Details</h3>
                                                        {{--                                                        <blockquote class="blockquote blockquote-info">--}}
                                                        <table class="table table-borderless report-table">
                                                            <tr>
                                                                <td class="text-muted">Ticket ID</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">TD-{{ $ticket->id }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Subject</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->subject }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Asset</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ \App\Models\Asset::find($ticket->asset_name)->name }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Incident/Issue</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->issue }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Assignee</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->solver->name }}</h6>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Status</td>
                                                                <td class="">
                                                                    <h6 class="font-weight-500"
                                                                        style="font-size: medium">{{ $ticket->status->name }}</h6>
                                                                </td>

                                                            </tr>
                                                        </table>
                                                        {{--                                                        </blockquote>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border border-primary">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <h3 class="font-weight-100 mb-xl-4 text-info"
                                                            style="font-size: medium">Description</h3>
                                                        {{--                                                        <div class="card-body">--}}
                                                        <blockquote class="blockquote blockquote-info">
                                                            <p style="text-align: justify">{{ $ticket->admin_reason ?? 'No reason currently available'}}</p>
                                                            <footer class="blockquote-footer">{{ $ticket->requester->name }}</footer>
                                                        </blockquote>
                                                        {{--                                                        </div>--}}
                                                        {{--                                                        <p class="" style="text-align: justify"><strong>"No Description is available"</strong></p>--}}
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{--                        <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">--}}
                            {{--                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                            {{--                            <span class="sr-only">Previous</span>--}}
                            {{--                        </a>--}}
                            {{--                        <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">--}}
                            {{--                            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                            {{--                            <span class="sr-only">Next</span>--}}
                            {{--                        </a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-primary">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Change Ticket Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.update-ticket', $ticket) }}" method="post">
                        @csrf
                        <div class="modal-body" >
                            {{--                        <strong>Kindly note that an email address will be sent to</strong>--}}
                            <p>The ticket status will change from
                                <label class="badge badge-warning" style=" font-size: 0.9em;color: #fff">{{ $ticket->status->name }}</label> to: </p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-warning">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="Pending" value="Pending">
                                            Pending
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="On-Hold" value="On-Hold">
                                            On-Hold
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="Solved" value="Solved">
                                            Solved
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="Cancelled" value="Cancelled">
                                            Cancelled
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="Closed" value="Closed">
                                            Closed
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-primary">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong><label for="exampleTextarea1">Kindly indicate the reason for status change if applicable</label></strong>
                                        <textarea class="form-control" id="exampleTextarea1" name="description"
                                                  rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dribbble" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

</div>
