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

                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    @include('admin.includes.image-picker', [
                                                        'name' => 'image',
                                                        'folder' => '',
                                                        'label' => 'Founder Image',
                                                        'current' => $data->image,
                                                        'pickerId' => 'picker-founder',
                                                    ])
                                                </div>
                                                <div class="col-lg-4">
                                                    @include('admin.includes.image-picker', [
                                                        'name' => 'image1',
                                                        'folder' => '',
                                                        'label' => 'Home Background Image',
                                                        'current' => $data->image1,
                                                        'pickerId' => 'picker-home-bg',
                                                    ])
                                                </div>
                                                <div class="col-lg-4">
                                                    @include('admin.includes.image-picker', [
                                                        'name' => 'image2',
                                                        'folder' => '',
                                                        'label' => 'Pages Header Image',
                                                        'current' => $data->image2,
                                                        'pickerId' => 'picker-header',
                                                    ])
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
