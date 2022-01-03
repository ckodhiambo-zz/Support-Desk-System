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

            <div class="col-lg-12 grid-margin stretch-card">
                <br>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of my Assigned Tickets</h4>
                        <p class="card-description">
                            The tickets are <code>.in a descending order</code>
                        </p>
                        {{--                    table-reponsive was here--}}
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" id="open-tab" data-toggle="tab" href="#open"
                                   role="tab" aria-controls="home" aria-selected="true">Open</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" id="pending-tab" data-toggle="tab" href="#pending"
                                   role="tab" aria-controls="profile" aria-selected="false">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-info" id="onhold-tab" data-toggle="tab" href="#on-hold"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">On-hold</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" id="solved-tab" data-toggle="tab" href="#solved"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Solved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" id="closed-tab" data-toggle="tab" href="#closed"
                                   role="tab"
                                   aria-controls="contact" aria-selected="false">Closed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                                   role="tab" aria-controls="contact" aria-selected="false">Cancelled</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" id="archived-tab" data-toggle="tab" href="#archived" role="tab"
                                   aria-controls="contact" aria-selected="false">Archived</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="open" role="tabpanel" aria-labelledby="open-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-primary">
                                                T-ID
                                            </th>
                                            <th class="text-primary">
                                                Requester
                                            </th>
                                            <th class="text-primary">
                                                Email
                                            </th>
                                            <th class="text-primary">
                                                Asset
                                            </th>
                                            <th class="text-primary">
                                                Status
                                            </th>
                                            <th class="text-primary">
                                                Created at
                                            </th>
                                            <th class="text-primary">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($myassignedtickets as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->id }}
                                                </td>
                                                <td>
                                                    {{ $item->requester->name }}
                                                </td>
                                                <td>
                                                    {{ $item->requester->email }}
                                                </td>
                                                <td>
                                                    {{ \App\Models\Asset::find($item->asset_name)->name }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-primary"
                                                           style=" font-size: 0.9em;">{{ $item->status->name }}</label>
                                                </td>
                                                <td>
                                                    {{ $item->created_at }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle"
                                                                type="button"
                                                                id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu"
                                                             aria-labelledby="dropdownMenuSizeButton3">
                                                            <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                            <a class="dropdown-item text-primary" href="#">-- Contact
                                                                Requester --</a>
                                                            <a class="dropdown-item text-success" href="#"
                                                               data-toggle="modal" data-target="#exampleModal">-- Edit
                                                                Status --</a>
                                                            <a class="dropdown-item text-info" href="#">-- View Details
                                                                --</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#"
                                                               style="color: red">Archive</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                        Ticket Status from <strong class="text-primary">Open</strong> to:</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-warning">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                                                    Pending
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-info">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                                                    On-Hold
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-success">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                                                    Solved
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-danger">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                                                    Cancelled
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-secondary">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                                                    Closed
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-danger">
                                                T-ID
                                            </th>
                                            <th class="text-danger">
                                                Requester
                                            </th>
                                            <th class="text-danger">
                                                Asset
                                            </th>
                                            <th class="text-danger">
                                                Agent
                                            </th>
                                            <th class="text-danger">
                                                Status
                                            </th>
                                            <th class="text-danger">
                                                Created at
                                            </th>
                                            <th class="text-danger">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                    @foreach($alltickets as $item)--}}
                                        <tr>
                                            <td class="py-1">
                                                {{--                                                        {{ $item->id }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->requester->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ \App\Models\Asset::find($item->asset_name)->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        Not Assigned--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->status->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->created_at }}--}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <a class="dropdown-item text-success" href="#"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal">-- Edit Status --</a>
                                                        <a class="dropdown-item text-info" href="#">-- View Details
                                                            --</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="on-hold" role="tabpanel" aria-labelledby="on-hold-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-info">
                                                T-ID
                                            </th>
                                            <th class="text-info">
                                                Requester
                                            </th>
                                            <th class="text-info">
                                                Asset
                                            </th>
                                            <th class="text-info">
                                                Agent
                                            </th>
                                            <th class="text-info">
                                                Status
                                            </th>
                                            <th class="text-info">
                                                Created at
                                            </th>
                                            <th class="text-info">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                    @foreach($alltickets as $item)--}}
                                        <tr>
                                            <td class="py-1">
                                                {{--                                                        {{ $item->id }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->requester->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ \App\Models\Asset::find($item->asset_name)->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        Not Assigned--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->status->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->created_at }}--}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <a class="dropdown-item text-success" href="#"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal">-- Edit Status --</a>
                                                        <a class="dropdown-item text-info" href="#">-- View Details
                                                            --</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="solved" role="tabpanel" aria-labelledby="solved-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-success">
                                                T-ID
                                            </th>
                                            <th class="text-success">
                                                Requester
                                            </th>
                                            <th class="text-success">
                                                Asset
                                            </th>
                                            <th class="text-success">
                                                Agent
                                            </th>
                                            <th class="text-success">
                                                Status
                                            </th>
                                            <th class="text-success">
                                                Created at
                                            </th>
                                            <th class="text-success">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                    @foreach($alltickets as $item)--}}
                                        <tr>
                                            <td class="py-1">
                                                {{--                                                        {{ $item->id }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->requester->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ \App\Models\Asset::find($item->asset_name)->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        Not Assigned--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->status->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->created_at }}--}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <a class="dropdown-item text-success" href="#"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal">-- Edit Status --</a>
                                                        <a class="dropdown-item text-info" href="#">-- View Details
                                                            --</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="closed" role="tabpanel" aria-labelledby="closed-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-muted">
                                                T-ID
                                            </th>
                                            <th class="text-muted">
                                                Requester
                                            </th>
                                            <th class="text-muted">
                                                Asset
                                            </th>
                                            <th class="text-muted">
                                                Agent
                                            </th>
                                            <th class="text-muted">
                                                Status
                                            </th>
                                            <th class="text-muted">
                                                Created at
                                            </th>
                                            <th class="text-muted">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                    @foreach($alltickets as $item)--}}
                                        <tr>
                                            <td class="py-1">
                                                {{--                                                        {{ $item->id }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->requester->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ \App\Models\Asset::find($item->asset_name)->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        Not Assigned--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->status->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $item->created_at }}--}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <a class="dropdown-item text-success" href="#"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal">-- Edit Status --</a>
                                                        <a class="dropdown-item text-info" href="#">-- View Details
                                                            --</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-warning">
                                                T-ID
                                            </th>
                                            <th class="text-warning">
                                                Requester
                                            </th>
                                            <th class="text-warning">
                                                Asset
                                            </th>
                                            <th class="text-warning">
                                                Agent
                                            </th>
                                            <th class="text-warning">
                                                Status
                                            </th>
                                            <th class="text-warning">
                                                Created at
                                            </th>
                                            <th class="text-warning">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="py-1">

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <a class="dropdown-item text-success" href="#"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal">-- Edit Status --</a>
                                                        <a class="dropdown-item text-info" href="#">-- View Details
                                                            --</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="archived" role="tabpanel" aria-labelledby="archived-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-muted">
                                                T-ID
                                            </th>
                                            <th class="text-muted">
                                                Requester
                                            </th>
                                            <th class="text-muted">
                                                Asset
                                            </th>
                                            <th class="text-muted">
                                                Agent
                                            </th>
                                            <th class="text-muted">
                                                Status
                                            </th>
                                            <th class="text-muted">
                                                Created at
                                            </th>
                                            <th class="text-muted">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="py-1">
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuSizeButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="dropdownMenuSizeButton3">
                                                        <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                        <a class="dropdown-item text-success" href="#"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal">-- Edit Status --</a>
                                                        <a class="dropdown-item text-info" href="#">-- View Details
                                                            --</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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

