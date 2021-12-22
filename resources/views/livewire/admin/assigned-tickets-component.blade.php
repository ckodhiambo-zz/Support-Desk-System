<div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
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
                            <a class="nav-link text-info" id="onhold-tab" data-toggle="tab" href="#on-hold" role="tab"
                               aria-controls="contact" aria-selected="false">On-hold</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success" id="solved-tab" data-toggle="tab" href="#solved" role="tab"
                               aria-controls="contact" aria-selected="false">Solved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" id="closed-tab" data-toggle="tab" href="#closed" role="tab"
                               aria-controls="contact" aria-selected="false">Closed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" id="cancelled-tab" data-toggle="tab" href="#cancelled"
                               role="tab" aria-controls="contact" aria-selected="false">Cancelled</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="archived-tab" data-toggle="tab" href="#archived" role="tab"
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
                                    @endforeach
                                    </tbody>
                                </table>

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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <a class="dropdown-item text-success" href="#" data-toggle="modal"
                                                       data-target="#exampleModal">-- Edit Status --</a>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <a class="dropdown-item text-success" href="#" data-toggle="modal"
                                                       data-target="#exampleModal">-- Edit Status --</a>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <a class="dropdown-item text-success" href="#" data-toggle="modal"
                                                       data-target="#exampleModal">-- Edit Status --</a>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <a class="dropdown-item text-success" href="#" data-toggle="modal"
                                                       data-target="#exampleModal">-- Edit Status --</a>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <a class="dropdown-item text-success" href="#" data-toggle="modal"
                                                       data-target="#exampleModal">-- Edit Status --</a>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                    <h6 class="dropdown-header"><strong>Actions</strong></h6>
                                                    <a class="dropdown-item text-success" href="#" data-toggle="modal"
                                                       data-target="#exampleModal">-- Edit Status --</a>
                                                    <a class="dropdown-item text-info" href="#">-- View Details --</a>
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
</div>




