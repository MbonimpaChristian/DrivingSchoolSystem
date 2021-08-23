@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h1>Edit User</h1>
            </div>
            <form action="/courses/{{ $course->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input name="name" type="hidden" class="form-control" value="{{ $course->id }}">
                </div>

                <div class="form-group">
                    <label>Names:</label>
                    <input name="name" type="text" class="form-control" value="{{ $course->name }}">
                </div>


                <div class="form-group">
                    <label>Price:</label>
                    <input name="price" type="text" class="form-control" value="{{ $course->price }}">
                </div>
                <input type="submit" class="btn-btn-info" value="Update">

            </form>
        </div>

    </div>

@endsection
