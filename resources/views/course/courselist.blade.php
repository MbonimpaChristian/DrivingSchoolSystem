@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card mb-3">
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

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Courses</h3>
                    @if (!$isSubbed)
                        <table class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}
                                    </td>
                                    <td>
                                        <a href="/courses/{{ $course->id }}" >{{ $course->name }}</a>
                                    </td>
                                    <td>{{ $course->price }}</td>
                                    <td>
                                        @if ($isAuthAdmin)
                                            <a href="/courses/{{ $course->id }}/edit" class="btn btn-primary">Edit</a>
                                            <a href="/courses/{{ $course->id }}/delete" class="btn btn-danger">Delete</a>
                                        @endif
                                        @if ($course->name == 'Provisoire')
                                            <a href="https://flutterwave.com/pay/wmpc52l8p3z1"
                                                class="btn btn-success">Pay</a>
                                        @else
                                            <a href="https://flutterwave.com/pay/s9eancmo72yk"
                                                class="btn btn-success">Pay</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <br>
                        You have already subbed to our courses
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
