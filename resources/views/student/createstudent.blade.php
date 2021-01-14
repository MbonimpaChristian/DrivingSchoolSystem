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
            <form action="/students" method="POST">
                {{-- <form action={{url('/store')}} method="post"> --}}
                @csrf
                
                <div class="form-group">
                    <label>Names:</label>
                    <input name="name" type="text" class="form-control"  placeholder="Course name">
                  </div>
                  

                  <div class="form-group">
                    <label>Email:</label>
                    <input name="email" type="text" class="form-control"  placeholder="Email">
                  </div>

                  <div class="form-group">
                    <label>Password:</label>
                    <input name="password" type="text" class="form-control"  placeholder="Your Password">
                  </div>

                  <div class="form-group">
                    <label>National id:</label>
                    <input name="N_id" type="text" class="form-control"  placeholder="Your national Id">
                  </div>

                  <div class="form-group">
                    <label>Address:</label>
                    <input name="address" type="text" class="form-control"  placeholder="Your address please">
                  </div>

                  <div class="form-group">
                    <label>Telephone:</label>
                    <input name="telephone" type="text" class="form-control"  placeholder="Your phone number">
                  </div>
                  <input type="submit" class="btn-btn-info" value="save">
                
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