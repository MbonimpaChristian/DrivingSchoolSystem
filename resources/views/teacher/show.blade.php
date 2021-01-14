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
                        <a class="list-group-item list-group-item-action active" href="{{action('TeacherController@mystudent')}}">My Student</a>
                        {{-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> --}}
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <h1>My Student</h1>
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
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nid }}</td>
                            <td>{{ $user->telephone }}</td>
                        </tr>
                    @endforeach
                </table>


            @else
            @endif
        </div>
    </div>
    </div>
</div>
@endsection
