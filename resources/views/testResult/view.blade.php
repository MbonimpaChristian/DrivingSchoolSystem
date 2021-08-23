@extends('layouts.app') @section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Test result</h3>
            <form action="/testResult/view" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    @foreach ($testResults as $value => $testResult)
                        @php
                            $student = App\User::find($testResult->User_id);
                        @endphp
                        <tr>
                            <th scope="col">{{ $value + 1 }}</th>
                            <th scope="col">{{ $student->name }}</th>
                            <th scope="col">{{ $testResult->marks }}</th>
                            <th scope="col">{{ $testResult->created_at }}</th>
                        </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
@endsection
