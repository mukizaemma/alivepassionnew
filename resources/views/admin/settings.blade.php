@extends('layouts.adminbase')

@section('title', 'Settings')

@section('sidebar')

    @parent

@endsection

@section('content')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('admin.includes.sidenav')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="btn btn-primary">Setting</h2>
                                        @if (session()->has('success'))
                                            <div class="arlert alert-success">
                                                <button class="close" type="button" data-dismiss="alert">X</button>
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <!-- ./card-header -->
                                    <div class="card-body">
                                        <form class="form" action="{{ route('saveSetting', $data->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Company Name</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->company }}" name="company">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput4">Address</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->address }}" name="address">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput4">Email</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->email }}" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Phone</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->phone }}" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Phone2</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->phone1 }}" name="phone1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Phone3</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->phone2 }}" name="phone2">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Facebook</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->facebook }}" name="facebook">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Instagram</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->instagram }}" name="instagram">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="projectinput4">YouTube</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->youtube }}" name="youtube">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label>Company Logo </label><br>
                                                        <label id="projectinput7" class="file center-block">
                                                            <img src="{{ asset('storage/images') . $data->logo }}"
                                                                alt="" width="150px">
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-12">
                                                        <label>Change the Company Logo <br><span style="color: red">(This
                                                                image should be resized to 120x90 pixels)</span></label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="image" name="logo">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions mt-5">
                                                <button type="submit" class="btn btn-primary text-black">
                                                    <i class="fa fa-save"></i> Save Changes
                                                </button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    </main>
    @include('admin.includes.footer')
    </div>
    </div>

@section('scripts')

    <script src="{{ asset('assets') }}/js/summernote.js"></script>

@endsection
