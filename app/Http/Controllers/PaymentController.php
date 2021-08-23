<?php

namespace App\Http\Controllers;

use App\Course;
use App\Payment;
use App\StudentTeacher;
use App\User;
use Illuminate\Http\Request;
use Services_Twilio;
// use Twilio\Rest\Client;
use Twilio\Http\CurlClient;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $courses = Course::all();
        $teachers = User::where('roles', 'ROLE_TEACHER')->get();
        $user = User::find($id);

        return view('payment.payment')->with(['user' => $user, 'courses' => $courses, 'teachers' => $teachers]);
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new \Twilio\Rest\Client($account_sid, $auth_token);
        $curlOptions = [CURLOPT_SSL_VERIFYHOST => false, CURLOPT_SSL_VERIFYPEER => false];
        $client->setHttpClient(new CurlClient($curlOptions));
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('typeofcourse') == 1) {
            $amount = 20000;
        } else {
            $amount = 140000;
        }

        $user = User::find($request->input('studentid'));
        $teacher = User::find($request->input('teachername'));

        Payment::create([
            'user_id' => $request->input('studentid'),
            'course_id' => $request->input('typeofcourse'),
            'P_date' => now(),
            'amount' => $amount
        ]);
        // $this->sendMessage('You have subscribed successful!!', "+".$user->telephone);

        if ($request->input('typeofcourse') == 2 && $request->input('teachername') !== "null") {
            if ($request->input('typeofcourse') == 2) {
                StudentTeacher::create([
                    'user_id' => $request->input('studentid'),
                    'teacher_id' => $request->input('teachername')
                ]);
            }
            $this->sendMessage('You have been assigned student ' . $user->name . '!!', "+" . $teacher->telephone);
        }

        return redirect()->route('redirection');
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
