<?php

namespace App\Http\Controllers;

use App\Test_result;
use App\TestQuestion;
use Illuminate\Http\Request;
use Auth;


class TestQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Question = new TestQuestion();
        return view('TestQuestion.create', ['TestQuestion' => $Question]);
    }

    public function test()
    {
        $questions = TestQuestion::all()->random(5);
        return view('TestQuestion.test', ['questions' => $questions]);
    }

    public function result(Request $request)
    {
        $questions = TestQuestion::all();
        $count = 0;
        foreach ($questions as $question) {
            if ($request->input($question->id) == $question->answer) {
                $count++;
            }
        }
        $testQuestions = $request->input();
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

        if (!$pageWasRefreshed) {
            $testResult = new Test_result();
            $testResult->user_id = Auth::user()->id;
            $testResult->marks = $count;
            $testResult->save();
        }
        return view('TestQuestion.TestResult', ['count' => $count, 'questions' => $questions, 'testQuestions' => $testQuestions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Question = new TestQuestion();
        $Question->question = $request->input('question');
        $Question->choiceA = $request->input('choiceA');
        $Question->choiceB = $request->input('choiceB');
        $Question->choiceC = $request->input('choiceC');
        $Question->choiceD = $request->input('choiceD');
        $Question->answer = $request->input('answer');

        $Question->save();
        return redirect('/TestQuestion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
