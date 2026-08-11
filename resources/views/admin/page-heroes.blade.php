@extends('layouts.adminbase')

@section('title', 'Page Headers')

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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="btn btn-primary">Page Header Images</h2>
                                    @if(session()->has('success'))
                                        <div class="arlert alert-success mt-2">
                                            <button class="close" type="button" data-dismiss="alert">X</button>
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <p class="text-muted mb-0 mt-2">
                                        Each inner page uses a full-screen header image. Upload or pick one per page.
                                        Pages without a custom image fall back to the default header in About.
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('savePageHeroes') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-4">
                                            @foreach ($pages as $key => $page)
                                                <div class="col-lg-4 col-md-6">
                                                    @include('admin.includes.image-picker', [
                                                        'name' => 'hero_'.$key,
                                                        'folder' => '',
                                                        'label' => $page['label'],
                                                        'help' => $page['hint'].'. Use a wide landscape photo for best results.',
                                                        'current' => optional($heroes[$key] ?? null)->image,
                                                        'pickerId' => 'picker-hero-'.$key,
                                                    ])
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-actions mt-4">
                                            <button type="submit" class="btn btn-primary text-black">
                                                <i class="fa fa-save"></i> Save Header Images
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('admin.includes.footer')
    </div>
</div>
@endsection
