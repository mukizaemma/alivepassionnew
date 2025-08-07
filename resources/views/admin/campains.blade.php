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
                    <li class="breadcrumb-item active">Recent Campaigns</li>
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
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><i
                                class="fa fa-plus"></i> Add New</button>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Program</th>
                                    <th>Description</th>
                                    <th>Goal</th>
                                    <th>Raised</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($campain as $rs)
                                <tr>
                                    <td><a href="{{ route('editCampain', $rs->id) }}">{{ $rs->title }}</a> </td>
                                    <td><img src="{{ asset('storage/images/campaigns/' . $rs->image) }}" alt="" width="150px"></td>
                                    <td>{{ $rs->program->title ?? '' }}</td>
                                    <td>{!! \Illuminate\Support\Str::limit(strip_tags($rs->description), 100) !!}</td>
                                    <td>{{$rs->goal}}</td>
                                    <td>
                                        <a href="{{ route('updateRaised', $rs->id) }}" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#raised_{{$rs->id}}" style="color:black">
                                            {{$rs->raised}} - {{$rs->percentage}}%
                                        </a>
                            
                                        <!-- The Modal -->
                                        <div class="modal" id="raised_{{$rs->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                            
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{ $rs->title }}</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                                                    </div>
                                            
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="form" action="{{ route('updateRaised',$rs->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                    
                                                                <div class="row mb-3">
                                                                    <div class="col-lg-6 col-sm-12">
                                                                        <label for="title" class="form-label">Total Goal</label>
                                                                        <input type="text"  class="form-control" id="title" value="{{ $rs->goal }}" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6 col-sm-12">
                                                                        <label for="title" class="form-label">Total Raised</label>
                                                                        <input type="text"  class="form-control" id="title" value="{{ $rs->raised }}" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6 col-sm-12">
                                                                        <label for="title" class="form-label">Add New Raised Amount</label>
                                                                        <input type="text" name="raised" class="form-control" id="title" placeholder="Raised Amount in $">
                                                                    </div>
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary text-black">
                                                                    <i class="fa fa-save"></i> Confirm New Raised
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <form method="POST" action="{{ route('resetGoalRaised', $rs->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Reset Goal & Raised</button>
                                                        </form>
                                                    </div>
                                            
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color:black">Close</button>
                                                    </div>
                                            
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a type="button" href="{{ route('editCampain', $rs->id) }}" class="btn btn-primary" style="color:black">Edit</a>
                                            <a type="button" href="{{ route('deleteCampain', $rs->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')" style="color:black">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- The Modal for adding new Campaign -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Adding New Campain</h4>
                                <button type="button" class="btn-close text-black" data-bs-dismiss="modal">X</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                            <form class="form" action="{{ route('saveCampain') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="program_id" class="form-label">Program</label>
                                            <select name="program_id" id="program_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}">{{ $program->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <label for="title" class="form-label">Title of the Campaign</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title of Campaign" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="goal" class="form-label">Goal</label>
                                            <input type="number" name="goal" class="form-control" id="goal" placeholder="Goal Amount in $" required min="0" step="0.01">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="youtube_video" class="form-label">Campaign's Video URL (Optional)</label>
                                            <input type="url" name="youtube_video" class="form-control" id="youtube_video" placeholder="URL for YouTube Video">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <label for="description" class="form-label">Detailed Description including the problem, solution, targeted audience as well as the expected impact</label>
                                            <textarea id="description" rows="5" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <label for="short_description" class="form-label">Donation Message</label>
                                            <textarea id="short_description" rows="5" class="form-control" name="short_description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="image" class="form-label">Cover Image</label>
                                            <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="youtube_cover_image" class="form-label">YouTube Cover Image</label>
                                            <input type="file" name="youtube_cover_image" class="form-control" id="youtube_cover_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary text-black">
                                        <i class="fa fa-save"></i> Publish New Campaign
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
