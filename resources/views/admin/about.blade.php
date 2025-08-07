@extends('layouts.adminbase')

@section('title', 'About Us')

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
                                    <h2  class="btn btn-primary">About us</h2>
                                    @if(session()->has('success'))
                                    <div class="arlert alert-success">
                                        <button class="close" type="button" data-dismiss="alert">X</button>
                                        {{ session()->get('success') }}
                                    </div>

                                    @endif
                                </div>
                                <!-- ./card-header -->
                                <div class="card-body">
                                    <form class="form" action="{{ route('saveAbout',$data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Mission</label>
                                                    <textarea id="mission" rows="5" class="form-control" name="mission">{!!$data->mission!!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput4">Vision</label>
                                                    <textarea id="vision" rows="5" class="form-control" name="vision">{!!$data->vision!!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Our Core Values</label>
                                                    <textarea id="aboutus" rows="5" class="form-control" name="values">{!!$data->values!!}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Backgound Image below Programs </label><br>
                                                    <label id="projectinput7" class="file center-block">
                                                      <img src="{{asset('storage/images').$data->backImage}}" alt="" width="150px">
                                                    </label>
                                                </div>

                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Change the Backgound Image below Programs <br><span style="color: red">(This image should be resized to 500X800 pixels)</span></label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="image" name="backImage">
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
