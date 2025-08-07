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
                <a href="{{ route('blog.index') }}" class="btn btn-primary">Back</a>
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
                            <form class="form" action="{{ url('updateBlog',$blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-8 col-sm-12">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control"  name="title" value="{{$blog->title}}">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="author" class="form-label">Author</label>
                                            <input type="text" name="author" class="form-control" value="{{$blog->author}}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col--12">
                                            <label for="summernote" class="form-label">Body</label>
                                            <textarea class="form-control" id="blogBody" rows="5" name="body">{!!$blog->body!!}</textarea>
                                        </div>
                                    </div>

                                    <div  class="row mt-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="image" class="form-label">Blog Cover Image<br> <span style="color: red">(This image should be resized to 500X800 pixels)</span></label>
                                            <img src="{{ asset('storage/images/news') . $blog->image }}" alt="" width="120px">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="image" class="form-label">Blog Cover Image<br> <span style="color: red">(This image should be resized to 500X800 pixels)</span></label>
                                            <div class="input-group">

                                                <input type="file" name="image" class="form-control" id="image">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="image" class="form-label">Change Gallery Images<br> <span style="color: red">(This image should be resized to 500X800 pixels)</span></label>
                                            <div class="input-group">

                                                <input type="file" class="form-control" name="gallery[]" multiple>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
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
