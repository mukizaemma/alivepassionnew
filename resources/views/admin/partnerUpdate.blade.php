@extends('layouts.adminbase')

@section('title', 'Edit Program')

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
                <a href="{{ route('partner') }}" class="btn btn-primary">Back</a>
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
                            <form class="form" action="{{ route('updatePartner',$data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Names</label>
                                            <input type="text" class="form-control" name="names" value="{{$data->names}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Partner website</label>
                                            <input type="text" class="form-control" name="website" value="{{$data->website}}">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="projectinput8">Partnership Description</label>
                                    <textarea id="ProgramDescription" rows="5" class="form-control" name="description"
                                        placeholder="Partnership Description">{!!$data->website!!}</textarea>
                                </div>

                                <div class="row mt-5">

                                    <div class="col-lg-6 col-sm-12">
                                        <label>Select File</label>
                                        <label id="projectinput7" class="file center-block">
                                            <img src="{{ asset('storage/images/partners') . $data->image }}" alt="" width="120px">
                                        </label>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <label>Select File</label>
                                        <label id="projectinput7" class="file center-block">
                                            <input type="file" id="image" name="image" >
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
            </main>
            @include('admin.includes.footer')
        </div>
    </div>

@section('scripts')

    <script src="{{ asset('assets') }}/js/summernote.js"></script>
@endsection
