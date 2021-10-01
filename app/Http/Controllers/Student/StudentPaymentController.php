<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Payment;
use App\User;
use DateTime;
use Carbon\Carbon;
use Services_Twilio;
use Twilio\Http\CurlClient;
use DB;

class StudentPaymentController extends Controller
{
    public function callback()
    {
        return redirect('/courses');
    }
    public function checkCommand()
    {

    }
    public function payWithFlutterWave(Request $request)
    {
        $courseToPay = Course::where('id',$request->courseId)->first();
        $studentWhoPaysThisCourse = Auth::user()->id;
        $tx_ref = Flutterwave::generateReference();
        $order_id = Flutterwave::generateReference('momo');

        $data = [
            'amount' => $courseToPay->price,
            'email' => Auth::user()->email,
            'redirect_url' => route('callback'),
            'phone_number' => Auth::user()->telephone,
            'tx_ref' => $tx_ref,
            'order_id' => $order_id
        ];
        try {
            $charge = Flutterwave::payments()->momoRW($data);
            if ($charge['status'] === 'success') {
                $newPayment = Payment::create([
                    'User_id'=>Auth::user()->id,
                    'Course_id'=>$courseToPay->id,
                    'P_date'=>now(),
                    'amount'=>$courseToPay->price,
                    'payment_status'=>'PAID'
                ]);
                // Redirect to the charge url
                return redirect($charge['data']['redirect']);
            }
        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();

        }
    }
}
