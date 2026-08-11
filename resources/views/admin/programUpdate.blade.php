@extends('layouts.adminbase')

@section('title', 'Edit Program')

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
            <a href="{{route('programs')}}" class="btn btn-primary">Back</a>
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
                        <form class="form" action="{{ route('updateProgram', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">Main Branch</label>
                                        <select class="form-control select2" name="parent_id"
                                            style="...">
                                            <option value="0" selected="selected">Main Main Branch
                                            </option>
                                            @foreach ($branches as $rs)
                                                <option value="{{ $rs->id }}">
                                                    {{ \App\Http\Controllers\BranchController::getParentsTree($rs, $rs->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="projectinput1">Program Name</label>
                                        <input type="text" class="form-control" name="title" value="{{$data->title}}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">Keywords</label>
                                        <input type="text" class="form-control"
                                            placeholder="Category keywords/Code" name="keywords">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <label for="projectinput8">Description</label>
                                <textarea id="ProgramDescription" rows="5" class="form-control" name="description" >{{$data->description}}</textarea>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    @include('admin.includes.image-picker', [
                                        'name' => 'image',
                                        'folder' => 'programs',
                                        'label' => 'Cover Image',
                                        'current' => $data->image,
                                    ])
                                </div>
                            </div>

                        </div>

                        <div class="form-actions mt-5">
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
