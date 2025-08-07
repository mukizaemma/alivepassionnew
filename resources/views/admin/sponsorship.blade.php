@extends('layouts.adminbase')

@section('title', 'Sponsorship')

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
                        <li class="breadcrumb-item active">Sponsorship</li>
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
                                    class="fa fa-plus"></i> Add New Sponsor</button>

                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Child Names</th>
                                        <th>Age</th>
                                        <th>Contact</th>
                                        <th>Testimony</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($children as $rs)
                                        <tr>
                                            <td><img src="{{ asset('storage/images/sponsorship') . $rs->image }}"
                                                    alt="" width="150px"></td>
                                            <td>{{ $rs->names }}</td>
                                            <td>{{ $rs->age }}</td>
                                            <td>{{ $rs->phone }}</td>
                                            <td>{!! $rs->testimony !!}</td>
                                            <td></td>

                                            <td>
                                                <div class="btn-btn-group ">
                                                    <a type="button" href="{{ route('editChild', $rs->id) }}"
                                                        class="btn btn-primary text-black"><i class="fa fa-edit"></i> </a>
                                                    <a type="button" href="{{ route('destroyChild', $rs->id) }}"
                                                        class="btn btn-danger text-black"
                                                        onclick="return confirm('Are you sure to delete this item?')"><i
                                                            class="fa fa-trash"></i></a>
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
                                    <h4 class="modal-title">Adding New Child</h4>
                                    <button type="button" class="btn-close text-black" data-bs-dismiss="modal">X</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="form" action="{{ route('saveChild') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Child Names</label>
                                                        <input type="text" class="form-control" placeholder="Child Names"
                                                            name="names" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Age</label>
                                                        <input type="text" class="form-control" placeholder="Child Age"
                                                            name="age" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Sex</label>
                                                        <select name="sex" id="" required="">
                                                            <option value=""></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Sponsorship Status</label>
                                                        <select name="status" id="" required="">
                                                            <option value=""></option>
                                                            <option value="Not Sponsored">Not Sponsored</option>
                                                            <option value="Sponsored">Sponsored</option>
                                                            {{-- <option value="Removed">Removed</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Address</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Child Address" name="contact">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Contact</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Child Contact" name="phone">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput8">Child Testimony</label>
                                                <textarea id="childTestimony" rows="5" class="form-control" name="testimany" placeholder="Testimony"></textarea>
                                            </div>

                                            <div class="row mt-5">

                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Child Picture</label>
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

    <script src="{{ asset('assets') }}/js/summernote.js"></script>

@endsection
