@extends('layouts.app')

@section('content')
    <form class="card" action="{{ route('testquestion.result') }}" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-center">TEST </h1>
                </div>
                @if (Auth::user()->roles == 'ROLE_ADMIN')
                  <div class="col-md-6">
                    <a href="/TestQuestion/create" class="btn btn-primary">Add new Question</a>
                  </div>
                @endif
            </div>
        </div>
        @foreach ($questions as $question)
            <fieldset class="m-2 p-2 form-group" id="{{ $question->id }}">
                <div class="row">
                    <legend class="col-form-label col-sm-12 pt-0">Question {{ $loop->index + 1 }}:
                        {{ $question->question }}
                    </legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                id="{{ $question->id }}" value="choiceA">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->choiceA }}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                id="{{ $question->id }}" value="choiceB">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->choiceB }}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                id="{{ $question->id }}" value="choiceC">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->choiceC }}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                id="{{ $question->id }}" value="choiceD">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->choiceD }}
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
        @endforeach
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </form>
@endsection
