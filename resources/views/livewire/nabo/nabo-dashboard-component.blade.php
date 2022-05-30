<div xmlns:wire="http://www.w3.org/1999/xhtml">
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
            /*body {*/
            /*    margin: 0;*/
            /*}*/

            /*.spanner {*/
            /*    position: absolute;*/
            /*    top: 50%;*/
            /*    left: 0;*/
            /*    background: #2a2a2a55;*/
            /*    width: 100%;*/
            /*    display: block;*/
            /*    text-align: center;*/
            /*    height: 300px;*/
            /*    color: #FFF;*/
            /*    transform: translateY(-50%);*/
            /*    z-index: 1000;*/
            /*    visibility: hidden;*/
            /*}*/

            /*.overlay {*/
            /*    position: fixed;*/
            /*    width: 100%;*/
            /*    height: 100%;*/
            /*    background: rgba(0, 0, 0, 0.5);*/
            /*    visibility: hidden;*/
            /*}*/

            /*.loader,*/
            /*.loader:before,*/
            /*.loader:after {*/
            /*    border-radius: 50%;*/
            /*    width: 2.5em;*/
            /*    height: 2.5em;*/
            /*    -webkit-animation-fill-mode: both;*/
            /*    animation-fill-mode: both;*/
            /*    -webkit-animation: load7 1.8s infinite ease-in-out;*/
            /*    animation: load7 1.8s infinite ease-in-out;*/
            /*}*/

            /*.loader {*/
            /*    color: #ffffff;*/
            /*    font-size: 10px;*/
            /*    margin: 80px auto;*/
            /*    position: relative;*/
            /*    text-indent: -9999em;*/
            /*    -webkit-transform: translateZ(0);*/
            /*    -ms-transform: translateZ(0);*/
            /*    transform: translateZ(0);*/
            /*    -webkit-animation-delay: -0.16s;*/
            /*    animation-delay: -0.16s;*/
            /*}*/

            /*.loader:before,*/
            /*.loader:after {*/
            /*    content: '';*/
            /*    position: absolute;*/
            /*    top: 0;*/
            /*}*/

            /*.loader:before {*/
            /*    left: -3.5em;*/
            /*    -webkit-animation-delay: -0.32s;*/
            /*    animation-delay: -0.32s;*/
            /*}*/

            /*.loader:after {*/
            /*    left: 3.5em;*/
            /*}*/

            /*@-webkit-keyframes load7 {*/
            /*    0%,*/
            /*    80%,*/
            /*    100% {*/
            /*        box-shadow: 0 2.5em 0 -1.3em;*/
            /*    }*/
            /*    40% {*/
            /*        box-shadow: 0 2.5em 0 0;*/
            /*    }*/
            /*}*/

            /*@keyframes load7 {*/
            /*    0%,*/
            /*    80%,*/
            /*    100% {*/
            /*        box-shadow: 0 2.5em 0 -1.3em;*/
            /*    }*/
            /*    40% {*/
            /*        box-shadow: 0 2.5em 0 0;*/
            /*    }*/
            /*}*/

            /*.show {*/
            /*    visibility: visible;*/
            /*}*/

            /*.spanner, .overlay {*/
            /*    opacity: 0;*/
            /*    -webkit-transition: all 0.3s;*/
            /*    -moz-transition: all 0.3s;*/
            /*    transition: all 0.3s;*/
            /*}*/

            /*.spanner.show, .overlay.show {*/
            /*    opacity: 1*/
            /*}*/

            .l-bg-cherry {
                background: linear-gradient(to right, #8d188e, #f09) !important;
                color: #fff;
            }

            .lg-bg-nabo {

                background: linear-gradient(to right, #142c3c, #6acfeb) !important;
                color: #fff;
            }
            .l-bg-green-dark {
                background: linear-gradient(to right, #0a504a, #38ef7d) !important;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <div class="content-wrapper">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}!</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly!<span
                                    class="text-primary"></span></h6>
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
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-outline-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card border-primary mb-3" style="border-color: #8d188e !important;">
                                        <div class="card-header lg-bg-nabo" style="border-radius: 10px">
                                            <h5>Internal Ticket Form</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description text-info">
                                Kindly fill in the necessary details inline with your request.
                            </p>
                            <form class="forms-sample" action="{{ route('employee.ticket.submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">Ticket Subject</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="Ticket Subject" name="subject"
                                                   aria-label="Username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">Item of Issue</label></strong>
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="e.g. APX Permissions" name="subject"
                                                   aria-label="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="">
                                            <strong><label class="text-primary">From</label></strong>
                                            <select class="js-example-basic-single w-100" name="asset_name">
                                                <option class=""
                                                        value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="">
                                            <strong><label class="text-primary">To</label></strong>
                                            <select class="js-example-basic-single w-100" name="asset_name">
                                                <option class=""
                                                        value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary" for="exampleTextarea1">Detailed
                                                    description</label></strong>
                                            <textarea class="form-control" id="exampleTextarea1" name="description"
                                                      rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label class="text-primary">File upload</label></strong>
                                            {{--                                            <input type="file" name="attachment" class="file-upload-default">--}}
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-upload-info"
                                                       placeholder="Upload Image" name="attachment"><span
                                                    class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="button"  class="btn lg-bg-nabo mr-2 float-right" data-toggle="modal"
                                        data-target="#delegateModal" style="color: #fff;border: none;">Delegate an Agent
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delegateModal" tabindex="-1" role="dialog"
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
                                <label id="ticket-label" for="exampleFormControlSelect3">Delegate to your preferred Agent</label>
                                <input type="text" id="ticket" name="ticket" hidden>
                                <select name="agent" class="form-control form-control-sm" id="exampleFormControlSelect3"
                                        required>
{{--                                    @foreach($users as $user)--}}
                                        <option value="#"> {{--                                            {{$user->phone_number}}--}}
                                        </option>
{{--                                    @endforeach--}}
                                </select>
                            </div>
                            <hr class="border-primary">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group col-sm-12">
                                        <strong><label class="text-primary">Select Priority</label></strong>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="Option1">
                                                        Low
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="Option2">
                                                        Medium
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="Option3">
                                                        High
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="Option4">
                                                        Urgent
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <button type="submit" class="btn l-bg-green-dark" style="border: none;">Assign Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    {{--<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>--}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $("button[type='submit']").click(function () {
            $("div.spanner").addClass("show");
            $("div.overlay").addClass("show");
        });
    </script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false
        });
    </script>
    <script>
        $('#category_id').change((event) => {
            $('.assets').hide();
            $(`.category_${event.target.value}`).show();
        });
        $(document).ready(function () {
            $('.assets').hide();
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


    </body>
    </html>
</div>
