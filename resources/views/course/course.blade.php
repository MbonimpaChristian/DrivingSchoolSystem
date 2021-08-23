@extends('layouts.app')

@section('content')
    @if ($course->id == 2)
        @if ($user->roles == 'ROLE_STUDENT')
            <div class="card mb-3" style="background-color: lightslategray;">
                <div class="card-body" >
                    <h3 class="card-title" style="color: white">
                        License Teacher
                    </h3>

                </div>
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">
                    License course
                </h3>
                <div class="row">
                    @foreach ($drivingLicenseVideo as $video)
                        <div class="mx-auto mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $video->name }}</h5>
                                <p class="text-muted">{{ $video->duration }} min - Posted
                                    {{ $video->created_at->diffForHumans() }}
                                </p>
                                <video class="rounded" width="240" height="120" controls>
                                    <source src="{{ asset('video/' . $video->name) }}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if ($course->id == 1)
        <div class="card mb-3">
            <div class="card-body" style="background-color: lightslategray;">
                <h3 class="card-title" style="color: white;">
                    Provisoire course
                </h3>
                <div class="row">
                    @foreach ($provisionalVideo as $video)
                        <div class="mx-auto mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $video->name }}</h5>
                                <p class="text-muted">{{ $video->duration }} min - Posted
                                    {{ $video->created_at->diffForHumans() }}
                                </p>
                                <video class="rounded" width="240" height="120" controls>
                                    <source src="{{ asset('video/' . $video->name) }}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
@endsection
