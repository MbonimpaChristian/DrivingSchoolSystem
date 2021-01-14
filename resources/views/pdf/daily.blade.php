<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily report
    </title>
</head>
<body>
    <h1>Daily Report of {{now()->toFormattedDateString()}}</h1>
    <p>Total new students: {{$numberOfStudent}}</p>
    <p>Total amount paid: {{$totalAmount}}</p>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Names</th>
            <th scope="col">Email</th>
            <th scope="col">N_id</th>
            <th scope="col">Address</th>
            <th scope="col">Telephone</th>

          </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th>{{$student->id}}</th>
                <th>{{$student->name}}</th>
                <th>{{$student->email}}</th>
                <th>{{$student->nid}}</th>
                <th>{{$student->address}}</th>
                <th>{{$student->telephone}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">User_id</th>
            <th scope="col">Course_id</th>
            <th scope="col">P_date</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <th>{{$payment->id}}</th>
                <th>{{$payment->user->id}}</th>
                <th>{{$student->cours_id}}</th>
                <th>{{$student->P_date}}</th>
                <th>{{$student->amount}}</th>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
