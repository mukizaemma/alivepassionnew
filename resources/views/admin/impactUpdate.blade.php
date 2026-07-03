@extends('layouts.adminbase')

@section('title', 'Edit Events')

@section('sidebar')

    @parent

@endsection

@section('content')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('admin.includes.sidenav')
        </div>
        <div id="layoutSidenav_content">
            <div class="card-header">
                <a href="{{ route('impact') }}" class="btn btn-primary">Back</a>
                @if (session()->has('success'))
                    <div class="arlert alert-success">
                        <button class="close" type="button" data-dismiss="alert">X</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <main>
                <div class="container-fluid px-4">
                    <div class="row">

                    </div>

                    <div class="card mb-4">

                        <div class="card-body">
                            <form class="form" action="{{ route('updateImpact', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="projectinput1">Impact Title</label>
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $data->title) }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="projectinput8">Program Description</label>
                                        <textarea id="ProgramDescription" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $data->description)}}"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="row mt-5">

                                        <div class="col-lg-6 col-sm-12">
                                            <label>Featured Cover Image</label>
                                            <img src="{{asset('storage/images/impacts/' . $data->image)}}" alt="" width="120px">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label>Update the Cover Image</label>
                                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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

    <script src="{{ asset('assets') }}/js/summernote.js"></script>
@endsection
