@extends('layouts.app')

@section('content')
    <h1>User</h1>
    <div class="row">
        <div class="col-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">
                        Actions
                    </h3>
                    <div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action"
                                href="{{ action('CourseController@index') }}">Courses</a>
                            <a class="list-group-item list-group-item-action"
                                href="{{ action('CourseController@addVideo', [$course->id]) }}">Add Video</a>
                            {{-- <a class="list-group-item list-group-item-action"
                                data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-messages"
                                role="tab" aria-controls="messages">Messages</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-settings"
                                role="tab" aria-controls="settings">Settings</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">User Profile</h3>
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $user->nid }}</h6>
                    <p class="card-text">
                        Email: {{ $user->email }} <br>
                        Phone: {{ $user->telephone }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-8">
            @if ($course->id == 2)
                @if ($user->roles == 'ROLE_STUDENT')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">
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
                                            {{ $video->created_at->diffForHumans() }}</p>
                                        <video class="rounded" width="240" height="120" controls>
                                            <source src="{{ asset('video/'.$video->name) }}">
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
                    <div class="card-body">
                        <h3 class="card-title">
                            Provisoire course
                        </h3>
                        <div class="row">
                            @foreach ($provisionalVideo as $video)
                                <div class="mx-auto mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $video->name }}</h5>
                                        <p class="text-muted">{{ $video->duration }} min - Posted
                                            {{ $video->created_at->diffForHumans() }}</p>
                                        <video class="rounded" width="240" height="120" controls>
                                            <source src="{{ asset('video/{$video->name}') }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection
