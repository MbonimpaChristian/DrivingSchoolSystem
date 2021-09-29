@extends('layouts.app')

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session()->get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body" style="background-color: lightblue">
            <h3 class="card-title">Courses</h3>
            @if (!$isSubbed || Auth::user()->roles == 'ROLE_ADMIN')
                <table class="table table-striped" style="background-color: lightgray;">
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
                                <a href="/courses/{{ $course->id }}">{{ $course->name }}</a>
                            </td>
                            <td>{{ $course->price }}</td>
                            <td>
                                @if ($isAuthAdmin)
                                    <a href="/courses/{{ $course->id }}/edit" class="btn btn-primary">Edit</a>
                                    <a href="/courses/{{ $course->id }}/delete" class="btn btn-danger">Delete</a>
                                @endif
                                {{-- @if ($course->name == 'Provisoire')
                                    <a href="https://flutterwave.com/pay/wmpc52l8p3z1" class="btn btn-success"
                                        target="_blank">Pay</a>
                                @else
                                    <a href="https://flutterwave.com/pay/s9eancmo72yk" class="btn btn-success"
                                        target="_blank">Pay</a>
                                @endif --}}
                                <form action="{{route('payWithFlutterWave')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="courseId" value="{{$course->id}}">
                                    <button class="btn btn-success" type="submit">subscribe</button>
                                </form>
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
@endsection
