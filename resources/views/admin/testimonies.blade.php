@extends('layouts.adminbase')

@section('title', 'Testimonies')

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
                        <li class="breadcrumb-item active">Testimonies</li>
                    </ol>
                    <div class="row">
                        @if (session()->has('success'))
                            <div class="arlert alert-success">
                                <button class="close" type="button" data-dismiss="alert">X</button>
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#myModal"><i
                                    class="fa fa-plus"></i> Add New Testimony</button>

                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Names</th>
                                        <th>Testimony</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $rs)
                                        <tr>
                                            <td>{{ $rs->names }}</td>
                                            <td>{!! $rs->testimony !!}</td>
                                            <td><img src="{{ asset('storage/images/testimonies') . $rs->image }}"
                                                    alt="" width="150px"></td>
                                            <td>
                                                <div class="btn-btn-group ">
                                                    <a type="button" href="{{ route('editTestimony', $rs->id) }}"
                                                        class="btn btn-primary text-black">Edit</a>
                                                    <a type="button" href="{{ route('destroyTestimony', $rs->id) }}"
                                                        class="btn btn-danger text-black"
                                                        onclick="return confirm('Are you sure to delete this item?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- The Modal for adding new Event -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Adding New Testimony</h4>
                                    <button type="button" class="btn-close text-black" data-bs-dismiss="modal">X</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="form" action="{{ route('saveTestimony') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Names</label>
                                                        <input type="text" class="form-control" placeholder="Names"
                                                            name="names" required="" placeholder="Names">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Testimony title</label>
                                                        <input type="text" class="form-control" placeholder="title"
                                                            name="title" placeholder="Title if any">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput8">Testimony Description</label>
                                                <textarea id="ProgramDescription" rows="5" class="form-control" name="testimony"
                                                    placeholder="Testimony Description"></textarea>
                                            </div>

                                            <div class="row mt-5">

                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Select File</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="image" name="image" required="">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-actions mt-5">
                                            <button type="submit" class="btn btn-primary text-black">
                                                <i class="fa fa-save"></i> Save
                                            </button>

                                        </div>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger text-black"
                                        data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
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
