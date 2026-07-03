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
                    <li class="breadcrumb-item active">Alive Passion Members</li>
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
                            data-bs-target="#myModal"><i class="fa fa-plus"></i> Add Members</button>

                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Date Joined</th>
                                    <th>Names</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    {{-- <th>Ministry</th> --}}
                                    <th>Martial Status</th>
                                    <th>Membership</th>
                                    {{-- <th>Branch</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($members as $rs)
                                <tr>

                                    <td>{{$rs->dateJoined}}</td>
                                    <td>{{$rs->names}}</td>
                                    <td>{{$rs->phone}}</td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->gender}}</td>
                                    {{-- <td>{{$rs->ministry_id}}</td> --}}
                                    <td>{{$rs->martual}}</td>
                                    <td>{{$rs->membership}}</td>
                                    {{-- <td>{{$rs->branch->name}}</td> --}}
                                    <td>{{$rs->status}}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-trash"></i></a>
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
                                        <h4 class="modal-title">Adding New CHurch Members</h4>
                                        <button type="button" class="btn-close text-black"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="form" action="{{ route('saveMember') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="comment-form__input-box">
                                                        <label for="">Your Names/ Amazina yawe</label>
                                                        <input type="text" placeholder="Your names" name="names"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <label for="">Your Phone/ Telephone yawe</label>
                                                    <div class="comment-form__input-box">
                                                        <input type="text" placeholder="Your Phone number" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="comment-form__input-box">
                                                        <label for="">Your Address</label>
                                                        <input type="text" name="address" placeholder="Your Address"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <label for="">Your Gender</label>
                                                    <select name="gender" id="" required="" class="text-black">
                                                        <option value=""></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label for="">Martial Status</label>
                                                    <select name="martual" class="text-black">
                                                        <option value=""></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="">
                                                        <label for="">Which Ministry do want to join?</label>
                                                        <select name="ministry_id" id="" class="text-black">
                                                            <option value="Any" selected="Any">Any</option>
                                                            @foreach ($programs as $rs)
                                                                <option value="{{ $rs->id }}">{{ $rs->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="">Which Kid Bright Future Branch do you want to join?</label>
                                                        <select name="branch_id" id="" required="" class="text-black">
                                                            <option value=""></option>
                                                            {{-- @foreach ($branches as $rs)
                                                                <option value="">{{ $rs->name }}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="">Membership status</label>
                                                        <select name="membership" id="" required="" class="text-black">
                                                            <option value=""></option>
                                                            <option value="New Member">New Member</option>
                                                            <option value="Existing Member">Existing Member</option>
                                                            <option value="Visitor">Visitor</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <label for="">Date Joined</label>
                                                        <input type="date" name="dateJoined" id="">
                                                    </div>

                                                    {{-- <div class="form-group mt-3">
                                                        <label for="projectinput8">Tell us more about yourself</label>
                                                        <textarea id="message" rows="5" class="form-control" name="message"
                                                            placeholder="Anything would you like us to know?"></textarea>
                                                    </div> --}}
                                                </div>
                                            </div>



                                        </div>

                                        <div class="form-actions mt-5">
                                            <button type="submit" class="btn btn-primary text-black">
                                                <i class="fa fa-save"></i> Confirm your Membership
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
