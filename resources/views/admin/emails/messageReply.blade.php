@extends('layouts.adminbase')

@section('title', 'Reply Emails')

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
                <a href="{{ route('redirects') }}" class="btn btn-primary">Back</a>
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
                            <form class="form" action="{{ route('sendReply') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-lg-6 col-sm-12 mb-3">
                                            <div class="form-group">
                                                {{-- <label for="projectinput1">Impact Title</label> --}}
                                                    <input type="hidden" class="form-control" id="email" name="id" value="{{$data->id }}">
                                                    <input type="text" class="form-control" id="email" name="email" value="{{$data->email }}" readonly >

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 mb-3">
                                            <label for="">Visitor's Message</label>
                                            <textarea id="ProgramDescription" rows="10" class="form-control" name="message"  readonly="">{{$data->message}}</textarea>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 mb-3">
                                            <label for="projectinput8">Your Reply Message</label>
                                            <textarea id="ProgramDescription" rows="10" class="form-control @error('reply') is-invalid @enderror" name="reply" value="{{ old('reply')}}" placeholder="Type your reply here"></textarea>
                                            @error('reply')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions mt-5">
                                    <button type="submit" class="btn btn-primary text-black">
                                        <i class="fa fa-save"></i> Reply
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
