@extends('layouts.adminbase')

@section('title', 'Edit Ministry')

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
            <a href="{{route('staff')}}" class="btn btn-primary">Back</a>
            @if(session()->has('success'))
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
                        <form class="form" action="{{ route('updateStaff', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row mb-4">
                                <div class="col-lg-6 col-sm-12">
                                        <label for="names">Names</label>
                                        <input type="text" class="form-control" value="{{ $data->names }}" name="names">
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" value="{{ $data->position }}"  name="position">
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <label for="projectinput1">Display Category</label>
                                      <select name="category" id="" class="form-control">
                                            <option value="" selected disabled>-- Select Category --</option>
                                            <option value="Administration">Administration Team</option>
                                            <option value="Operations">Operations Team</option>
                                            <option value="Advisors">Advisors Team</option>
                                        </select>
                            </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-4 col-sm-12">
                                        <label for="names">Facebook Page Url</label>
                                        <input type="text" class="form-control" value="{{ $data->facebook }}" name="facebook">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="position">Instagram Page Url</label>
                                    <input type="text" class="form-control" value="{{ $data->instagram }}"  name="instagram">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <label for="position">Twuitter Page Url</label>
                                    <input type="text" class="form-control" value="{{ $data->twitter }}"  name="twitter">
                                </div>
                            </div>

                            <div class="row mt-5">

                                <div class="col-lg-6 col-sm-12">
                                    <label>Select File</label><br>
                                    <label id="projectinput7" class="file center-block">
                                        <img src="{{asset('storage/images/staff').$data->image}}" alt="" width="120px">
                                    </label>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Change Staff Profile <br><span style="color: red">(This image should be resized to 270X312 pixels)</span></label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="image" name="image">
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                            <label>Biography</label>
                            <textarea id="bio" rows="5" class="form-control" name="bio">{{ $data->bio }}</textarea>
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
