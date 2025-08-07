@extends('layouts.adminbase')

@section('title', 'Edit Events')

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
            <a href="{{route('campainCrud')}}" class="btn btn-primary">Back</a>
            @if(session()->has('success'))
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
                            <form class="form" action="{{ route('updateCampain', $campain->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <select name="program_id">
                                                <option value="" disabled selected>{{ $campain->program->title ?? '' }}</option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}">{{ $program->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <label for="title" class="form-label">Title of the Campaign</label>
                                            <input type="text" name="title" class="form-control" value="{{ $campain->title }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-2 col-sm-12">
                                            <label class="form-label">Goal</label>
                                            <input type="text" name="goal" class="form-control" value="{{ $campain->goal }}">
                                        </div>
                                        <div class="col-lg-2 col-sm-12">
                                            <label class="form-label">Raised</label>
                                            <input type="text" name="raised" class="form-control" value="{{ $campain->raised }}">
                                        </div>
                                        <div class="col-lg-2 col-sm-12">
                                            <label class="form-label">Raised in %</label>
                                            <input type="text" name="percentage" class="form-control" value="{{ $campain->percentage }}" readonly>
                                        </div>

                                                                                <div class="col-lg-3 col-sm-12">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="Active" {{ $campain->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Completed" {{ $campain->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="Inactive" {{ $campain->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                        <div class="col-lg-3 col-sm-12">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="Active" {{ $campain->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Completed" {{ $campain->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="Inactive" {{ $campain->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label for="display" class="form-label">Display on Featured Course?</label><br>
                                            <input type="checkbox" id="display" name="display" value="Featured" {{ $campain->display == 'Featured' ? 'checked' : '' }}>
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Description</label>
                                            <textarea rows="5" class="form-control" name="description">{!! $campain->description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Donation Message</label>
                                            <textarea rows="5" class="form-control" name="description">{!! $campain->description !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-label">Cover Image</label><br>
                                            <img src="{{ asset('storage/images/campaigns/' . $campain->image) }}" alt="" width="120px">
                                            <input type="file" name="image" class="form-control mt-2">
                                        </div>
                                        {{-- <div class="col-lg-4 col-sm-12">
                                            <label class="form-label">YouTube Cover Image</label><br>
                                            <img src="{{ asset('storage/images/campains/' . $campain->youtubeimg) }}" alt="" width="120px">
                                            <input type="file" name="youtubeimg" class="form-control mt-2">
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="form-actions mt-4">
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

<script src="{{asset('assets')}}/js/summernote.js"></script>
@endsection
