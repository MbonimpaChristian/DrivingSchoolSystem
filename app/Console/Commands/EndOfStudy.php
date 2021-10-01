<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Payment;
use Services_Twilio;
use Carbon\Carbon;
use Twilio\Http\CurlClient;

class EndOfStudy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'study:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting all students whose monthly subscriptions ended';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $allPaidStudents = User::where('roles','ROLE_STUDENT')->whereNotNull('teacherId')->get();
        $now = Carbon::now();
        foreach($allPaidStudents as $student){
           $paymentDate = Payment::where('User_id',$student->id)->first();
           $paymentDateFormatted = $paymentDate->P_date;
           $diffDays =  round((time() - strtotime($paymentDateFormatted)) / 86400);
           if($diffDays > 30){
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new \Twilio\Rest\Client($account_sid, $auth_token);
            $curlOptions = [CURLOPT_SSL_VERIFYHOST => false, CURLOPT_SSL_VERIFYPEER => false];
            $client->setHttpClient(new CurlClient($curlOptions));
            $client->messages->create(
                $student->telephone,
                ['from' => $twilio_number, 'body' => 'Ukwezi kwawe kwarangiye']
            );
            $teacher = User::where('id',$student->teacherId)->first();

            $client->messages->create(
                $teacher->telephone,
                ['from' => $twilio_number, 'body' => 'Umunyeshuri witwa '. $student->name .' ukwezi kwe kwarangiye']
            );
            $deletePayment = Payment::where('User_id',$student->id)->delete();
            $userUpdate = User::where('id',$student->id)->update([
                'hasTeacher'=>false,
                'teacherId'=>NULL
            ]);
           }

        }
        $this->info('Twasibye neza abasoje ukwezi kwabo');
    }
}
