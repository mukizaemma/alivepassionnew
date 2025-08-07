@extends('layouts.adminbase')

@section('title', 'Donations')

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
                    <li class="breadcrumb-item active">Alive Passion Programs</li>
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
                    <div class="card-header">
                        <button class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#myModal"><i class="fa fa-plus"></i> Add New Program</button>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Program Title</th>
                                    <th>Description</th>
                                    {{-- <th>Gallery</th> --}}
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->title}}</td>
                                    <td>{!!$rs->description!!}</td>
                                    <td><img src="{{ asset('storage/images/programs/' . $rs->image) }}" alt="" width="150px"></td>
                                    <td>                                                <div class="btn-btn-group ">
                                        <a type="button" href="{{ route('editProgram', $rs->id) }}"
                                            class="btn btn-primary text-black">Edit</a>
                                        <a type="button" href="{{ route('destroyProgram', $rs->id) }}"
                                            class="btn btn-danger text-black" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
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
                                        <h4 class="modal-title">Adding New Program</h4>
                                        <button type="button" class="btn-close text-black"
                                            data-bs-dismiss="modal">X</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="form" action="{{ route('saveProgram') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    {{-- <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Branch</label>
                                                            <select class="form-control select2" name="branch_id"
                                                                style="...">
                                                                @foreach ($branch as $rs)
                                                                    <option value="{{ $rs->id }}">
                                                                        {{ \App\Http\Controllers\ProgramController::getParentsTree($rs, $rs->name) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}

                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Program Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Program Name" name="title" required="">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput8">Program Description</label>
                                                    <textarea id="ProgramDescription" rows="5" class="form-control" name="description" placeholder="Program Description"></textarea>
                                                </div>

                                                <div class="row mt-5">

                                                    <div class="col-lg-6 col-sm-12">
                                                        <label>Cover Image </label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="image" name="image"
                                                                required="">
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

<script src="{{asset('assets')}}/js/summernote.js"></script>

@endsection
