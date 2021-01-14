@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylsheet" href="{{asset('css/style.css')}}">
    <title>Students</title>
  </head>
  <body>
    @include("navbar")

    <div class="row header-container justify-content-center">
        <div class="header">
            <h1>Students who registered</h1>

    </div>
    @if(count($courses)>0)
                <table class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>N_id</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th >Action</th>
                    </tr>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->email}}</td>
                        <td>{{$course->password}}</td>
                        <td>{{$course->N_id}}</td>
                        <td>{{$course->address}}</td>
                        <td>{{$course->telephone}}</td>
                        <td>
                            <a href="/courses/{{$course->id}}/edit" class="btn btn-primary">Edit</a>
                            <a href="/courses/{{$course->id}}/delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                 </table>
                @else
                <br>
                    You have no Students
                    @endif

    @if($layout=='index')
    <div class="container-fluid mmt-4">
        <div class="container-fluid mt-4">
        <div class="row justify-content-center">
        <section class="col-md-7">
        </section>
        </div>
    </div>
    </div>
    @elseif($layout=='create')

    <div class="container-fluid mt-4">
        <div class="row">
        <section class="col-md-7">
        </section>
        <section>
        <div class="card mb-3">
            <img src="https://www.techopedia.com/images/uploads/human-people-person-poster-art-doodle-drawing-white-board-toy-accessor.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
              
              
              
              {{-- <form action={{url('/store')}} method="post">
                @csrf
                
                <div class="form-group">
                    <label>Names:</label>
                    <input name="Names" type="text" class="form-control"  placeholder="Enter your name">
                  </div>
                  

                  <div class="form-group">
                    <label>Price:</label>
                    <input name="speciality" type="text" class="form-control"  placeholder="Enter your speciality">
                  </div>
                  <input type="submit" class="btn-btn-info" value="UPDATED">
                  <input type="submit" class="btn-btn-warning" value="Reset">
                
              </form> --}}
            </div>
          </div>

           
        </section>
    </div>
</div>
    @elseif($layout=='show')
    <div class="container-fluid mt-4">
        <div class="row">
        <section class="col">
        </section>
        <section class="col">
            
                
        </section>
    </div>
</div>
    @elseif($layour=='edit')
    <div class="container-fluid mt-4">
        <div class="row">
        <section class="col md-7">
        </section>
        <section class="col md-5">

            <div class="card mb-3">
                <img src="https://www.techopedia.com/images/uploads/human-people-person-poster-art-doodle-drawing-white-board-toy-accessor.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Updated information </h5>
                  
                  <form action={{url('/update/'.$course->id)}} method="post">
                    @csrf
                    <div class="form-group">
                        <label>Names:</label>
                        <input name="name" type="text" class="form-control"  placeholder="Enter your name">
                      </div>
    
                      <div class="form-group">
                        <label>Email:</label>
                        <input name="email" type="text" class="form-control"  placeholder="Enter your email">
                      </div>
                      <div class="form-group">
                        <label>Password:</label>
                        <input name="password" type="text" class="form-control"  placeholder="Enter your email">
                      </div>

                      <div class="form-group">
                        <label>National id:</label>
                        <input name="N_id" type="text" class="form-control"  placeholder="Enter your email">
                      </div>

                      <div class="form-group">
                        <label>Address:</label>
                        <input name="address" type="text" class="form-control"  placeholder="Enter your email">
                      </div>

                      <div class="form-group">
                        <label>Telephone:</label>
                        <input name="telephone" type="text" class="form-control"  placeholder="Enter your email">
                      </div>

                      <input type="submit" class="btn-btn-info" value="SAVE">
                      <input type="submit" class="btn-btn-warning" value="Reset">
                </form>

                </div>
              </div>

            
        </section>
    </div>
</div>
    @endif

    <footer></footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
@endsection