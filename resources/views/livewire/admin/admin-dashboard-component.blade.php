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
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}!</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('assets/images/dashboard/people.svg') }}" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card l-bg-cherry">
                            <div class="card-body">
                                <p class="mb-4">Total No. of Tickets</p>
                                <p class="fs-30 mb-2">{{$alltickets->count()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4"> Total No. of Assigned Assets</p>
                                <p class="fs-30 mb-2">6</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Solved tickets</p>
                                <p class="fs-30 mb-2">34040</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Your Unsolved tickets</p>
                                <p class="fs-30 mb-2">47033</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Latest Tickets</h4>
                        <p class="card-description">
                            The tickets are <code>.in a descending order</code>
                        </p>
                        @if(Session::has('message_sent'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message_sent') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        T-ID
                                    </th>
                                    <th>
                                        Requester
                                    </th>
                                    <th>
                                        Asset
                                    </th>
                                    <th>
                                        Agent
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alltickets as $item)
                                    <tr>
                                        <td class="py-1">
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->requester->name }}
                                        </td>
                                        <td>
                                            {{ \App\Models\Asset::find($item->asset_name)->name }}
                                        </td>
                                        <td>
                                            {{ $item->solver ? $item->solver->name : 'Not Assigned' }}
                                        </td>
                                        <td>
                                            {{ $item->status->name }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <button class="dropdown-item text-success" href="#"
                                                            data-toggle="modal"
                                                            data-target="#ticketModal" data-ticket-id="{{ $item->id }}">
                                                        -- Assign / Edit Agent--
                                                    </button>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog"
         aria-labelledby="ticketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="ticketModalLabel">Assign an Agent</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('solver.set') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <strong>* An email will be sent to the agent assigned *</strong>
                        <br>
                        <br>
                        <div class="form-group">
                            <label id="ticket-label" for="exampleFormControlSelect3">Select an Agent</label>
                            <input type="text" id="ticket" name="ticket" hidden>
                            <select name="admin" class="form-control form-control-sm" id="exampleFormControlSelect3"
                                    required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }} - {{ ($user->email) }} -
                                        {{$user->phone_number}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="border-primary">
                        <div class="form-group">
                            <div class="form-check">
                                <strong>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="phone_number" value="true">
                                        Send SMS to the selected agent
                                    </label>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- plugins:js -->

    {{--    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>--}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false
        });
    </script>
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/s/todolist.js') }}j"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- End custom js for this page-->

    <script>
        $(document).ready(function () {
            $("#ticketModal").on("show.bs.modal", function (e) {
                $('#ticket').val($(e.relatedTarget).data('ticket-id'));
            });
        });
    </script>
    </body>
    </html>
</div>
