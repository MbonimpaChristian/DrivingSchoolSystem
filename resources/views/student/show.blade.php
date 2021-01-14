@extends('layouts.app')

@section('content')
    <h1>User</h1>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        Actions
                    </h3>
                    <div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active"
                                href="{{ action('CourseController@index') }}">Courses</a>
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
        </div>
        <div class="col-5">
            @if ($isSubbed)
                @if ($coursePaid->Course_id == 1)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course1->name }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course1->price }}</h6>
                            <p class="card-text">
                                Date: {{ $coursePaid->P_date }} <br>
                            </p>
                            <a href="{{ action('CourseController@show', [$course2->id]) }}" class="btn btn-primary">View
                                Course</a>
                        </div>
                    </div>
                @endif
                @if ($coursePaid->Course_id == 2)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course2->name }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course2->price }}</h6>
                            <p class="card-text">
                                Date: {{ $course2->date }} <br>
                                Timeleft:20 days
                            </p>
                            <a href="{{ action('UserController@show', [$teacher->id]) }}" class="btn btn-primary">View
                                Teacher</a>
                        </div>
                    </div>
                @endif
            @else
                <div class="card mb-3">
                    <div class="card-body">
                        You haven't subscribed to any course
                    </div>
                </div>
            @endif
        </div>
        <div class="col-3">
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
    </div>
@endsection
