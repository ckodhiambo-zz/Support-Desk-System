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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
        <style>
            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e,#0d47a1) !important;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <br>
                <div class="card card-outline-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                    <div class="card-header l-bg-cherry" style="border-radius: 10px">
                                        <h5>List of All Tickets</h5>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">
                                The tickets are <code>.in a descending order</code>
                            </p>

                            @if(Session::has('message_sent'))
                                <div class="alert alert-info" role="alert">
                                    {{ Session::get('message_sent') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped">
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
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <button class="dropdown-item text-primary" href="#"
                                                                data-toggle="modal"
                                                                data-target="#ticketModal" data-ticket-id="{{ $item->id }}">
                                                            <strong> -- Assign / Edit Agent--
                                                            </strong>
                                                        </button>
                                                        <a class="dropdown-item text-info" href="#">
                                                            <strong>-- View Details --</strong>  </a>
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
                            <select name="agent" class="form-control form-control-sm" id="exampleFormControlSelect3"
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
                                        <input type="checkbox" class="form-check-input" name="phone_number"
                                               value="true">
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
    </body>
    </html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#ticketModal").on("show.bs.modal", function (e) {
                $('#ticket').val($(e.relatedTarget).data('ticket-id'));
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example2').DataTable();
        });
    </script>
</div>
