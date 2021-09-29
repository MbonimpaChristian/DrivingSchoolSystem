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
    <title>Test Questions</title>
  </head>
  <body>

            <div class="container" style="background-color: #fff;padding:40px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">Add New Question</h2>
                       <form action="" method="POST">
                           @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                            <input type="text" class="form-control" name="question" aria-describedby="emailHelp" placeholder="Enter Question">
                          </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Choice A</label>
                            <input type="text" class="form-control" name="choiceA" aria-describedby="emailHelp" placeholder="Enter choice A">
                          </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Choice B</label>
                            <input type="text" class="form-control" name="choiceB" aria-describedby="emailHelp" placeholder="Enter choice B">
                          </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Choice C</label>
                            <input type="text" class="form-control" name="choiceC" aria-describedby="emailHelp" placeholder="Enter choice C">
                          </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Choice D</label>
                            <input type="text" class="form-control" name="choiceD" aria-describedby="emailHelp" placeholder="Enter choice D">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Answer</label>
                            <select class="form-control" name="answer">
                              <option selected disabled>select choice</option>
                              <option value="choiceA">choice A</option>
                              <option value="choiceB">choice B</option>
                              <option value="choiceC">choice C</option>
                              <option value="choiceD">choice D</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary"> Add New Question</button>
                       </form>
                    </div>
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
