<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skydash Admin</title>
        <!-- Styles -->
        <!-- Plugin css for this page -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <!-- Template Main CSS File -->
        <link href="{{ asset('website-assets/css/style.css') }}" rel="stylesheet">
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e, #0d47a1) !important;
                color: #fff;
            }
        </style>

        @livewireStyles
    </head>

    <body>
    <div class="col-12 grid-margin">
        <br>
        <div class="card card-outline-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                            <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                <h5>List of All Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Users are in <code>an ascending order.</code>
                </p>
                @if(Session::has('message_sent'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" id="new-tab" data-toggle="tab" href="#new"
                           role="tab" aria-controls="home" aria-selected="true">Administrators</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="in-progress-tab" data-toggle="tab" href="#agents"
                           role="tab" aria-controls="home" aria-selected="true">Agents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" id="open-tab" data-toggle="tab" href="#open"
                           role="tab" aria-controls="home" aria-selected="true">Default Users</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="new" role="tabpanel" aria-labelledby="new-tab">
                        <div class="table-responsive">
                            <table id="example60" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        U-ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone No.
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Created_at
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Models\User::where('user_type', 'Administrator')->get() as $user)
                                    <tr>
                                        <td class="py-1">
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number ?? 'Not Available' }}</td>
                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;"><strong>{{ $user->user_type }}</strong></label>

                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>

                                        <td>
                                            {{--                                            <a href="{{ route('employee.ticket-detail', $ticket)}}"--}}
                                            {{--                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>--}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="agents" role="tabpanel" aria-labelledby="agent-tab">
                        <div class="table-responsive">
                            <table id="example62" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        U-ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone No.
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Created_at
                                    </th>
                                    <th>
                                        Action
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Models\User::where('user_type', 'Agent')->get() as $user)
                                    <tr>
                                        <td class="py-1">
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number ?? 'Not Available'  }}</td>

                                        <td>
                                            <label class="badge badge-primary"
                                                   style=" font-size: 0.9em;"><strong>{{ $user->user_type }}</strong></label>

                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            {{--                                            <a href="{{ route('employee.ticket-detail', $ticket)}}"--}}
                                            {{--                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>--}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="open" role="tabpanel" aria-labelledby="open-tab">
                        <div class="table-responsive">
                            <table id="example63" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        U-ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Created_at
                                    </th>
                                    <th>
                                        Phone No.
                                    </th>
                                    <th>
                                        Action
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Models\User::where('user_type', 'default_user')->get() as $user)
                                    <tr>
                                        <td class="py-1">
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number }}</td>
                                        <td>
                                            {{--                                            <a href="{{ route('employee.ticket-detail', $ticket)}}"--}}
                                            {{--                                               class="btn btn-outline-info btn-sm btn-fw">View Details</a>--}}
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example60').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example62').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example63').DataTable();
        });
    </script>

    </body>

    </html>
</div>
