@extends('layouts.adminbase')

@section('title', 'Recent News')

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
                        <li class="breadcrumb-item active">Recent News</li>
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
                                    class="fa fa-plus"></i> Add New Post</button>

                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Blog Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($blogs as $rs)
                                        <tr>
                                            <td>{{ $rs->created_at }}</td>
                                            <td>{{ $rs->title }}</td>
                                            <td>{!! $rs->body !!}</td>
                                            <td>
                                                <img src="{{ asset('storage/images/news/' . $rs->image) }}" alt="" width="150px">
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('editBlog', $rs->id) }}" class="btn btn-primary text-black">Edit</a>
                                                    <a href="{{ route('deleteBlog', $rs->id) }}"
                                                    class="btn btn-danger text-black"
                                                    onclick="return confirm('Are you sure to delete this item?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center mt-3">
                                {{ $blogs->links() }}
                            </div>
                        </div>

                    </div>
                    <!-- The Modal for adding new Event -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Adding News</h4>
                                    <button type="button" class="btn-close text-black" data-bs-dismiss="modal">X</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="form" action="{{ url('saveBlog') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row mb-3">
                                                <div class="col-lg-8 col-sm-12">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" name="title" class="form-control"
                                                        id="title" placeholder="Title">
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <label for="author" class="form-label">Author</label>
                                                    <input type="text" name="author" class="form-control"
                                                        id="author" placeholder="Credits goes to who?">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="summernote" class="form-label">Body</label>
                                                    {{-- <textarea class="form-control" id="blogBody" rows="5" name="body"></textarea> --}}
                                                    <textarea id="blogBody" rows="5" class="form-control" name="body"></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label for="image" class="form-label">Blog Cover Image<br> <span
                                                            style="color: red">(This image should be resized to 500X800
                                                            pixels)</span></label>
                                                    <div class="input-group">

                                                        <input type="file" name="image" class="form-control"
                                                            id="image">

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <label for="gallery" class="form-label">Upload up to 3 more Images<br>
                                                        <span style="color: red">(This image should be resized to 500X800
                                                            pixels)</span></label>
                                                    <div class="input-group">

                                                        <input type="file"class="form-control" id="gallery"
                                                            name="gallery[]" multiple>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary text-black">
                                                <i class="fa fa-save"></i> Publish Now
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
