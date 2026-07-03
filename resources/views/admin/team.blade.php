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
                    <li class="breadcrumb-item active">Our Team</li>
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
                            data-bs-target="#myModal"><i class="fa fa-plus"></i> Add Team</button>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Names</th>
                                    <th>Position</th>
                                    <th>Category</th>
                                    <th>BIO</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($team as $rs)
                                <tr>

                                    <td><img src="{{asset('storage/images/staff').$rs->image}}" alt="" width="150px"></td>
                                    <td>{{$rs->names}}</td>
                                    <td>{{$rs->position}}</td>
                                    <td>{{$rs->category}}</td>
                                    <td>{!!$rs->bio!!}</td>

                                    <td> <div class="btn-btn-group ">
                                        <a type="button" href="{{ route('editStaff', $rs->id) }}"
                                            class="btn btn-primary text-black">Edit</a>
                                        <a type="button" href="{{ route('destroyStaff', $rs->id) }}"
                                            class="btn btn-danger text-black" onclick="return confirm('Are you sure to delete this Staff from the Database?')">Delete</a>
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
                                        <h4 class="modal-title">Adding New Staff Member</h4>
                                        <button type="button" class="btn-close text-black"
                                            data-bs-dismiss="modal">X</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="form" action="{{ route('saveStaff') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">

                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-sm-12">
                                                            <label for="names">Staff Names</label>
                                                            <input type="text" class="form-control"
                                                            placeholder="Event Title" name="names"  required="">
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="position">Position</label>
                                                        <input type="text" class="form-control"
                                                        placeholder="Staff Position" name="position"  required="">
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="projectinput1">Category</label>
                                                        <select name="category" id="" class="form-control">
                                                            {{-- <option value="Administration" selected="Administration">Administration Team</option> --}}
                                                            <option value="Operations">Operations Team</option>
                                                            <option value="Advisors">Advisors Team</option>
                                                        </select>
                                                </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-sm-12">
                                                            <label for="facebook">Phone</label>
                                                            <input type="text" class="form-control"
                                                            placeholder="Facebook" name="phone">
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="instagram">Facebook Page Url</label>
                                                        <input type="text" class="form-control"
                                                        placeholder="Instagram" name="facebook">
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="position">Instagram Page Url</label>
                                                        <input type="text" class="form-control"
                                                        placeholder="Staff Position" name="instagram">
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="twitter">Twitter Page Url</label>
                                                        <input type="text" class="form-control"
                                                        placeholder="Twitter" name="twitter">
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-4 col-sm-12">
                                                            <label>Select File <br><span style="color: red">(This image should be resized to 270X312 pixels)</span></label>
                                                            <label id="projectinput7" class="file center-block">
                                                                <input type="file" id="image" name="image"
                                                                    required="">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                    </div>

                                                    <div class="col-lg-8 col-sm-12">
                                                        <label>Biography</label>
                                                        <textarea id="bio" rows="5" class="form-control" name="bio" placeholder="Staff BIO"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions mt-5">
                                                <button type="submit" class="btn btn-primary text-black">
                                                    <i class="fa fa-save"></i> Add New Staff
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
