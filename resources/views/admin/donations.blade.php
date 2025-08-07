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
                    <li class="breadcrumb-item active">Recent Donation Pledges</li>
                </ol>
                <div class="row">
                    @if(session()->has('success'))
                    <div class="arlert alert-success">
                        <button class="close" type="button" data-dismiss="alert">X</button>
                        {{ session()->get('success') }}
                    </div>

                    @endif
                    @if(session()->has('warning'))
                    <div class="arlert alert-warning">
                        <button class="close" type="button" data-dismiss="alert">X</button>
                        {{ session()->get('warning') }}
                    </div>

                    @endif
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <button class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#myModal"><i class="fa fa-plus"></i> Add New Donation</button>

                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Date Done</th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Amount Donated</th>
                                    <th>Program</th>
                                    <th>Period</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->created_at}}</td>
                                    <td>{{$rs->names}}</td>
                                    <td>{{$rs->email}}</td>
                                    <td>{{$rs->country}}</td>
                                    <td>{{$rs->amount}}</td>
                                    <td>{{$rs->program_id}}</td>
                                    <td>{{$rs->period}}</td>
                                    <td>{{$rs->message}}</td>
                                    <td>
                                        <div class="btn-btn-group ">
                                        <a type="button" href="{{ route('mailDonation', $rs->id) }}"
                                            class="btn btn-primary text-black">Mail</a>
                                        <a type="button" href="{{ route('deleteDonation', $rs->id) }}"
                                            class="btn btn-danger text-black" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
