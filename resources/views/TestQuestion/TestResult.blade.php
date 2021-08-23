@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card m-4 p-4 text-center h4 {{ $count >= (count($testQuestions)/2) ? 'border-success' : 'border-danger' }}">
            <p>You have finished your test.</p>
            <p>You have {{ $count }} over {{count($testQuestions)}}</p>
        </div>
        @foreach ($questions as $question)
            @foreach ($testQuestions as $key => $testQuestion)
                @if ($question->id == $key)
                    @php $answer = $question->answer; @endphp
                    <div class="{{ $answer == $testQuestion ? 'border-success' : 'border-danger' }} card m-4 p-4">

                        <h5>Question : {{ $question->question }}</h5>
                        <span><strong>Choice A:</strong> {{ $question->choiceA }}</span>
                        <span><strong> Choice B:</strong> {{ $question->choiceB }}</span>
                        <span><strong> Choice C:</strong> {{ $question->choiceC }}</span>
                        <span><strong> Choice D:</strong> {{ $question->choiceD }}</span>
                        <span><strong> The Answer:</strong> {{ $question->$answer }}</span>
                        <span><strong> Your Answer:</strong> {{ $question->$testQuestion }}</span>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection
