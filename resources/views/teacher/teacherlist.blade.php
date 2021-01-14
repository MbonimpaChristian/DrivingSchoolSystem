@extends('layouts.app')

@section('content')
<h1>Teacher</h1>
<div class="row">
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">
                            Actions
                        </h3>
                        <div>
                              <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" href="{{action('CourseController@index')}}">Courses</a>
                                <a class="list-group-item list-group-item-action" href="{{action('TeacherController@index')}}">Teachers</a>
                                <a class="list-group-item list-group-item-action" href="{{action('TeacherController@create')}}">Add a Teachers</a>
                                {{-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> --}}
                              </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">

                <div class="card">
                    <div class="card-body">
                <h3 class="card-title">Teachers</h3>
                @if(count($teachers)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Driving License</th>
                                    <th>Plate Number</th>
                                    <th>Model</th>
                                    <th >Action</th>
                                </tr>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->category}}</td>
                                    <td>{{$teacher->drivinglicense}}</td>
                                    <td>{{$teacher->plateNo}}</td>
                                    <td>{{$teacher->cartype}}</td>
                                    <td>
                                        <a href="/teachers/{{$teacher->id}}/edit" class="btn btn-primary">Edit</a>
                                        <a href="/teachers/{{$teacher->id}}/delete" class="btn btn-danger">Delete</a>
                                        {{-- @if($course->name == 'Provisoire')
                                        <a href="https://flutterwave.com/pay/wmpc52l8p3z1" class="btn btn-success">Payment</a>
                                        @else
                                        <a href="https://flutterwave.com/pay/s9eancmo72yk" class="btn btn-success">Payment</a>
                                        @endif --}}
                                    </td>
                                </tr>
                                @endforeach
                             </table>
                             @else
                             <br>
                                 @endif
                    </div>
                </div>

            </div>
</div>
@endsection
