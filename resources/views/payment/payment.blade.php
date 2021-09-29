@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-3">
        <div class="card mb-3">
            <div class="card-body">
                {{-- <h3 class="card-title">
                    Actions
                </h3> --}}
                {{-- <div>
                    <div class="list-group" id="list-tab" role="tablist">
                        <a
                            class="list-group-item list-group-item-action active"
                            href="{{ action('CourseController@index') }}"
                            >Courses</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            href="{{ action('TeacherController@index') }}"
                            >Teachers</a
                        >

                        {{--
                        <a
                            class="list-group-item list-group-item-action"
                            data-toggle="list"
                            href="#list-profile"
                            role="tab"
                            aria-controls="profile"
                            >Profile</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            data-toggle="list"
                            href="#list-messages"
                            role="tab"
                            aria-controls="messages"
                            >Messages</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            data-toggle="list"
                            href="#list-settings"
                            role="tab"
                            aria-controls="settings"
                            >Settings</a
                        >
                        --}}
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Save Payment</h3>
                <form action="/payment/store" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{-- <form action={{url('/teachers/store')}} method="post">
                    --}} @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>StudentName:</label>
                                <input name="studentid" value="{{$user->id}}" hidden>
                                <input
                                    name="studentname"
                                    type="text"
                                    class="form-control"
                                    value="{{$user->name}}"
                                    disabled
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Type of course:</label>
                                <select
                                class="form-control" name="typeofcourse" id="">
                                    @foreach($courses as $course)
                                    <option disabled value="{{$course->id}}" @if ($course->id == $selectedCourseId)
                                       @php
                                           echo "selected";
                                       @endphp
                                    @endif >{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Teacher Name:</label>
                                <select
                                class="form-control" name="teacherId" id="">
                                    <option selected disabled value="null">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input
                        type="submit"
                        class="btn btn-info"
                        value="Assign Teacher"
                    />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
