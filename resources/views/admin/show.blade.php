@extends('layouts.app') @section('content')

    <h1>Users</h1>
    <div class="card p-5 d-flex flex-row flex-wrap  justify-content-between">
        @if (count($users) > 0)
            {{-- <table id="userstable" class="table table-striped">
                --}}
                {{-- <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>N_id</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                </thead> --}}
                @foreach ($users as $user)
                    {{-- <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nid }}</td>

                        <td>{{ $user->telephone }}</td>

                        <td>
                            <a href="/payment/{{ $user->id }}/approvepayment" class="btn btn-success">Approve
                                payment</a>
                        </td>
                    </tr> --}}
                    {{-- <tr> --}}

                        <div class="card m-2" style="width: 18rem;">
                            <img width="100%" src="{{ asset('images/pro.jpg') }}" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">{{ $user->id }}</h2>
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text"><b>Email:</b>&nbsp; {{ $user->email }}</p>
                                <p class="card-text"><b>NID:</b>&nbsp; {{ $user->nid }}</p>
                                <p class="card-text"><b>Phone:</b>&nbsp; {{ $user->telephone }}</p>
                                <a href="/payment/{{ $user->id }}/approvepayment" class="btn btn-success">Approve
                                    payment</a></a>
                            </div>
                        </div>


                        {{--
                    </tr> --}}
                @endforeach
                {{--
            </table> --}}


        @else
            <br />
            You have no Students
        @endif
    </div>

@endsection
