@extends('layouts.app')

@section('content')
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
@endsection
