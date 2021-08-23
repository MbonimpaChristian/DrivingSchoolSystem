@extends('layouts.app')

@section('content')
<h1>Users</h1>
<div class="row">
        @foreach ($users as $user)
        <div class="m-3 col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$user->nid}}</h6>
                    <p class="card-text">
                        Email: {{ $user->email}} <br>
                        Phone: {{$user->telephone}}
                    </p>
                    <a href="{{action('UserController@show', ['id' => $user->id])}}" class="card-link">More Info</a>
                </div>
            </div>

        </div>
        @endforeach
</div>
@endsection
