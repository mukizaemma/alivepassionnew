@extends('layouts.adminbase')

@section('title', 'Background')

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
                                    <h2  class="btn btn-primary">Our Background</h2>
                                    @if(session()->has('success'))
                                    <div class="arlert alert-success">
                                        <button class="close" type="button" data-dismiss="alert">X</button>
                                        {{ session()->get('success') }}
                                    </div>

                                    @endif
                                </div>
                                <!-- ./card-header -->
                                <div class="card-body">
                                    <form class="form" action="{{ route('saveBackg',$data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">About Us Details</label>
                                                    <textarea id="background" rows="10" class="form-control" name="description">{!!$data->description!!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">About the Founder</label>
                                                    <textarea id="background" rows="10" class="form-control" name="donations">{!!$data->donations!!}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Founder Image </label><br>
                                                    <label id="projectinput7" class="file center-block">
                                                      <img src="{{ asset('storage/images/' . $data->image) }}" width="150">

                                                    </label>
                                                </div>

                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Change the founder Image</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="image" name="image">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Home Back Image </label><br>
                                                    <label id="projectinput7" class="file center-block">
                                                        <img src="{{ asset('storage/images/' . $data->image1) }}" width="150">

                                                    </label>
                                                </div>

                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Change the home back Image</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="image" name="image1">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Pages Header Image </label><br>
                                                    <label id="projectinput7" class="file center-block">
                                                      <img src="{{ asset('storage/images/' . $data->image2) }}" width="150">

                                                    </label>
                                                </div>

                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Change the pages header Image</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="image" name="image2">
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

<script src="{{asset('assets')}}/js/summernote.js"></script>

@endsection
