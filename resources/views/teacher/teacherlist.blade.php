@extends('layouts.app')

@section('content')

    <div class="card" style="width: 60em;">
        <div class="card-body">
            <h3 class="card-title" style="background-color: lightblue;">Teachers</h3>
            {{-- <div>
                <div class="mx-auto pull-right">
                    <div class="">
                        <form action="{{ route('TeacherController.index') }}" method="GET" role="search">

                            <div class="input-group">
                                <span class="input-group-btn mr-5 mt-1">
                                    <button class="btn btn-info" type="submit" title="Search projects">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                                <a href="{{ route('TeacherController.index') }}" class=" mt-1">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
            @if (count($teachers) > 0)
                <table class="table table-striped" style="background-color: lightgray;">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Driving License</th>
                        <th>Plate Number</th>
                        <th>Model</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->category }}</td>
                            <td>{{ $teacher->drivinglicense }}</td>
                            <td>{{ $teacher->plateNo }}</td>
                            <td>{{ $teacher->cartype }}</td>
                            <td>
                                <a href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-primary">Edit</a>

                                {{-- @if ($course->name == 'Provisoire')
                                    <a href="https://flutterwave.com/pay/wmpc52l8p3z1" class="btn btn-success">Payment</a>
                                    @else
                                    <a href="https://flutterwave.com/pay/s9eancmo72yk" class="btn btn-success">Payment</a>
                                @endif --}}
                            </td>
                            <td><a href="/teachers/{{ $teacher->id }}/delete" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <br>
            @endif
        </div>
    </div>

@endsection
