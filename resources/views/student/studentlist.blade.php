@extends('layouts.app')

@section('content')
    <h1 style="background-color: lightskyblue; width: 113%;" class="p-2 text-center">Students</h1>
    <div class="card">
        @if (count($users) > 0)
            <table id="userstable" class="table table-striped w-100" style="background-color:lightgray;">
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
                            <div class="btn-group">
                            <a href="/students/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                            <a href="/students/{{ $user->id }}/delete" class="btn btn-danger">Delete</a>
                        </div>
                        </td>
                    </tr>

                @endforeach
            </table>


        @else
            <div class="alert alert-danger">
                <h4 class="text-center">
                    You have no Students
                </h4>
            </div>
        @endif
    </div>
@endsection
