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
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
                <div class="row">
                    @if(session()->has('success'))
                    <div class="arlert alert-success">
                        <button class="close" type="button" data-dismiss="alert">X</button>
                        {{ session()->get('success') }}
                    </div>

                    @endif
                </div>

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <ul class="nav nav-tabs card-header-tabs" id="programTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab">All</a>
                                </li>
                                @foreach($programs as $program)
                                    <li class="nav-item">
                                        <a class="nav-link" id="program-{{ $program->id }}-tab" data-bs-toggle="tab" href="#program-{{ $program->id }}" role="tab">
                                            {{ $program->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="fa fa-plus"></i> Add Image
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="programTabsContent">
                                <!-- All Images Tab -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    <table class="table table-hover mt-3">
                                        <thead>
                                            <tr>
                                                <th>Program</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($images as $rs)
                                            <tr>
                                                <td>{{ $rs->program->title ?? '' }}</td>
                                                <td><img src="{{ asset('storage/images/gallery/'.$rs->image) }}" width="150px"></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('editGallery', $rs->id) }}" class="btn btn-primary text-black">Edit</a>
                                                        <a href="{{ route('destroyGallery', $rs->id) }}" class="btn btn-danger text-black"
                                                            onclick="return confirm('Are you sure to delete this item?')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Per Program Tabs -->
                                @foreach($programs as $program)
                                <div class="tab-pane fade" id="program-{{ $program->id }}" role="tabpanel">
                                    <table class="table table-hover mt-3">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($images->where('program_id', $program->id) as $rs)
                                            <tr>
                                                <td><img src="{{ asset('storage/images/gallery/'.$rs->image) }}" width="150px"></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('editGallery', $rs->id) }}" class="btn btn-primary text-black">Edit</a>
                                                        <a href="{{ route('destroyGallery', $rs->id) }}" class="btn btn-danger text-black"
                                                            onclick="return confirm('Are you sure to delete this item?')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                        <!-- The Modal for adding new Event -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Adding New Image</h4>
                                        <button type="button" class="btn-close text-black"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <form class="form" action="{{ route('saveGallery') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row mb-3">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label for="image" class="form-label">Select File</label>
                                                    <input type="file" id="image" name="image" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-4 col-sm-12">
                                                    <label for="program_id" class="form-label">Program</label>
                                                    <select name="program_id" id="program_id" class="form-control" required>
                                                        <option value="" disabled selected>-- Select --</option>
                                                        @foreach ($programs as $program)
                                                            <option value="{{ $program->id }}">{{ $program->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-8 col-sm-12">
                                                    <label for="caption" class="form-label">
                                                        Image Caption 
                                                        <br><small class="text-danger">(Image should be 540x600 pixels)</small>
                                                    </label>
                                                    <input type="text" id="caption" name="caption" class="form-control" placeholder="Image Caption">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save"></i> Add New Image
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

<script src="{{asset('assets')}}/js/summernote.js"></script>

@endsection
