@extends('layouts.adminbase')

@section('title', 'Home Page')

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
            <div class="container-fluid px-4">
                {{-- <h1 class="mt-4">Dashboard</h1> --}}
                <ol class="breadcrumb mb-4">

                </ol>
                <div class="row">
                    @if(session()->has('success'))
                    <div class="arlert alert-success">
                        <button class="close" type="button" data-dismiss="alert">X</button>
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    @if(session()->has('warning'))
                    <div class="arlert alert-warning">
                        <button class="close" type="button" data-dismiss="alert">X</button>
                        {{ session()->get('warning') }}
                    </div>
                    @endif
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{route('slides')}}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('updateSlide', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">

                            <div class="row mb-5">

                                <div class="col-lg-4 col-sm-12">
                                        <label>Featured Image<br></label>
                                        <label id="projectinput7" class="file center-block">
                                            <img src="{{ asset('storage/images/slides/' . $data->image) }}" alt="" width="120px">
                                        </label>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                        <label>Change Image <br><span style="color: red">(This image should be resized to 694x1894 pixels)</span></label>
                                        <label id="projectinput7" class="file center-block">
                                            <input type="file" id="image" name="image">
                                            <span class="file-custom"></span>
                                        </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="projectinput8">Image Caption </label>
                                    <input type="text" class="form-control"
                                    value="{{$data->heading}}" name="heading">
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
        </main>
        @include('admin.includes.footer')
    </div>
</div>

@section('scripts')

<script src="{{asset('assets')}}/js/summernote.js"></script>

@endsection
