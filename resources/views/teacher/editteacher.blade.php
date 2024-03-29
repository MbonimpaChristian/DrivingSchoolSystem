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
    <title>Teacher</title>
  </head>
  <body>
 <div class="alert alert-info">
     <h4 class="text-center">
         Edit {{ $teacher->name }}
     </h4>
 </div>

    <div class="row header-container justify-content-center">
        <div class="header">
            <form action="{{ route('teacher.update',$teacher->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="put">
                  <div class="form-group">
                    <label>Names:</label>
                    <input name="name" type="text" class="form-control"  value="{{$teacher->name}}">
                  </div>


                  <div class="form-group">
                    <label>Email:</label>
                    <input name="email" type="text" class="form-control"  value="{{$teacher->email}}">
                  </div>


                  <div class="form-group">
                    <label>National id:</label>
                    <input name="N_id" type="text" class="form-control"  value="{{$teacher->nid}}">
                  </div>

                  <div class="form-group">
                    <label>Address:</label>
                    <input name="address" type="text" class="form-control"  value="{{$teacher->address}}">
                  </div>

                  <div class="form-group">
                    <label>Telephone:</label>
                    <input name="telephone" type="text" class="form-control"  value="{{$teacher->telephone}}">
                  </div>

                  <div class="form-group">
                    <label>Category:</label>
                    <input name="category" type="text" class="form-control"  value="{{$teacher->category}}">
                  </div>

                  <div class="form-group">
                    <label>Driving License:</label>
                    <input name="drivinglicense" type="text" class="form-control"  value="{{$teacher->drivinglicense}}">
                  </div>

                  <div class="form-group">
                    <label>Plate number:</label>
                    <input name="plateNo" type="text" class="form-control"  value="{{$teacher->plateNo}}">
                  </div>

                  <div class="form-group">
                    <label>Cartype&Model:</label>
                    <input name="cartype" type="text" class="form-control"  value="{{$teacher->cartype}}">
                  </div>
                  <button type="submit" class="btn btn-info">Update</button>

              </form>
        </div>
    </div>



    <footer></footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
