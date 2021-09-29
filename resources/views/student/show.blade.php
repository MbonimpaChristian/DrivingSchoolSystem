@extends('layouts.app')

@section('content')
            @if ($isSubbed)
                @if ($coursePaid->Course_id == 1)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course1->name }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course1->price }} Frws</h6>
                            <p class="card-text">
                                Teacher: {{ $teacher }} <br>
                            </p>
                            <p class="card-text">
                                Date: {{ $coursePaid->P_date }} <br>
                            </p>
                            <a href="{{ action('CourseController@show', [$course1->id]) }}" class="btn btn-primary">View
                                Course</a>
                        </div>
                    </div>
                @endif
                @if ($coursePaid->Course_id == 2)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course2->name }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course2->price }} frws</h6>
                            <p class="card-text">
                                {{-- Date: {{ $course2->date }} <br> --}}
                                Timeleft:20 days
                            </p>
                            {{-- <a href="{{ action('UserController@show', [$teacher->id]) }}" class="btn btn-primary">View
                                Teacher</a> --}}
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
@endsection
