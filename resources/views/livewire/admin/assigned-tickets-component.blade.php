<div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of my Assigned Tickets</h4>
                    <p class="card-description">
                        The tickets are <code>.in a descending order</code>
                    </p>
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
{{--                            @foreach($alltickets as $item)--}}
                                <tr>
                                    <td class="py-1">
{{--                                        {{ $item->id }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $item->requester->name }}--}}
                                    </td>
                                    <td>
{{--                                        {{ \App\Models\Asset::find($item->asset_name)->name }}--}}
                                    </td>
                                    <td>
{{--                                        Not Assigned--}}
                                    </td>
                                    <td>
{{--                                        {{ $item->status->name }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $item->created_at }}--}}
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
                                                   data-target="#exampleModal">-- Assign / Edit Agent--</a>
                                                <a class="dropdown-item text-info" href="#">-- View Details --</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" style="color: red">Archive</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
{{--                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"--}}
{{--                                     aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title text-primary" id="exampleModalLabel">Assign an Agent</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                        aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <strong>* An email will be sent to the agent assigned *</strong>--}}
{{--                                                <br>--}}
{{--                                                <br>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="exampleFormControlSelect3">Select an Agent</label>--}}
{{--                                                    <select class="form-control form-control-sm"--}}
{{--                                                            id="exampleFormControlSelect3">--}}
{{--                                                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }} ({{ auth()->user()->email }})</option>--}}
{{--                                                        <option>Kennedy Calvins (k.odhiambo@tierdata.co.ke)</option>--}}
{{--                                                        <option>Eric Mwendwa (e.mwendwa@tierdata.co.ke)</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" class="btn btn-danger" data-dismiss="modal">--}}
{{--                                                    Close--}}
{{--                                                </button>--}}
{{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
