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
            <a href="{{route('children')}}" class="btn btn-primary">Back</a>
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
                        <form class="form" action="{{ route('updateChild', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Child Names</label>
                                        <input type="text" class="form-control" value="{{$data->names}}"
                                            name="names">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="projectinput4">Age</label>
                                        <input type="text" class="form-control"  value="{{$data->names}}" name="age">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="projectinput4">Sex</label>
                                        <select name="sex" id="">
                                            <option value="{{$data->sex}}">{{$data->sex}}</option>

                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="projectinput4">Sponsorship Status</label>
                                        <select name="status" id="">
                                            <option value="{{$data->status}}">{{$data->status}}</option>
                                            <option value="Not Sponsored">Not Sponsored</option>
                                            <option value="Sponsored">Sponsored</option>
                                            {{-- <option value="Removed">Removed</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="projectinput4">Address</label>
                                        <input type="text" class="form-control" value="{{$data->contact}}" name="contact">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="projectinput4">Contact</label>
                                        <input type="text" class="form-control" value="{{$data->phone}}" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="projectinput8">Child Testimony</label>
                                <textarea id="childTestimony" rows="5" class="form-control" name="testimany">{{$data->testimany}}</textarea>
                            </div>

                            <div class="row mt-5">

                                <div class="col-lg-6 col-sm-12">
                                    <label>Child's Picture</label>
                                    <img src="{{ asset('storage/images/sponsorship') . $data->image }}" alt="" width="120px">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Change the Child's Picture <br><span style="color: red">(This image should be resized to 540x600 pixels)</span></label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="image" name="image">
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

<script src="{{asset('assets')}}/js/summernote.js"></script>
@endsection
