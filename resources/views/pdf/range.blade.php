<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily report
    </title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body style='font-family: "Gill Sans Extrabold", sans-serif;'>
    <h1 style="text-align: left; color:orange;">United Driving School</h1>
    <h2 style="text-align: center;"><u>Payment done from {{ $from }} to {{ $to }}</u></h2>
    <p>Total new students: {{ $numberOfStudent }}</p>
    <p>Course Name: {{ $CourseName }}</p>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Names</th>
                {{-- <th scope="col">Email</th> --}}
                <th scope="col">N_id</th>
                <th scope="col">Address</th>
                <th scope="col">Telephone</th>
                <th scope="col">Teacher Names</th>
                <th scope="col">Amount Paid</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th>{{ $student->name }}</th>
                    {{-- <th>{{$student->email}}</th> --}}
                    <th>{{ $student->nid }}</th>
                    <th>{{ $student->address }}</th>
                    <th>{{ $student->telephone }}</th>
                    @foreach ($teachers as $teacher)
                        @if ($teacher->id == $student->teacherId)
                            <th>{{ $teacher->name }}</th>
                        @endif
                    @endforeach
                    @foreach ($payments as $payment)
                        @if ($student->id == $payment->User_id)
                            <th>{{ $payment->amount }} frws</th>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total amount paid: <b>{{ $totalAmount }} frws</b></p>
    <div style="float: right">
        <p>Printed By:{{ Auth::user()->name }}</p>
        <p>Printed on: @php
            echo date('Y-m-d');
        @endphp</p>
    </div>
</body>

</html>
