@extends('layouts.app') @section('content')
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
                            <a class="list-group-item list-group-item-action"
                                href="{{ action('TeacherController@index') }}">Teachers</a>
                            <a class="list-group-item list-group-item-action" href="#" data-toggle="modal" data-target="#exampleModal">Reports</a>

                            {{--
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-profile"
                                role="tab" aria-controls="profile">Profile</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-messages"
                                role="tab" aria-controls="messages">Messages</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-settings"
                                role="tab" aria-controls="settings">Settings</a>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h1>Users</h1>
            <div class="card">
                @if (count($users) > 0)
                    <table id="userstable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>N_id</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nid }}</td>

                                <td>{{ $user->telephone }}</td>
                                <td>
                                    <a href="/payment/{{ $user->id }}/approvepayment" class="btn btn-success">Approve
                                        payment</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>


                @else
                    <br />
                    You have no Students
                @endif
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card p-2 m-2">
                        <h2>Reports</h2>
                        <div class="d-flex justify-content-between flex-row">
                            <a href="{{ action('HomeController@getDailyReport') }}" class="btn btn-sm btn-primary">Daily Report</a>
                            <a href="{{ action('HomeController@getWeeklyReport') }}" class="btn btn-sm btn-primary">Weekly Report</a>
                            <a href="{{ action('HomeController@getMonthlyReport') }}" class="btn btn-sm btn-primary">Monthly Report</a>
                          </div>
                    </div>

                    <div class="card p-2 m-2">
                        <h2>Reports By Date Range</h2>
                        <form  action="/pdf/range" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">From:</label>
                              <input name="from" type="date" class="form-control" placeholder="From">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">To:</label>
                              <input name="to" type="date" class="form-control"  placeholder="To">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
