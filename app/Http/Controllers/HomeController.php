<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Payment;
use App\StudentTeacher;
use App\User;
use Auth;
use DataTables;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function redirection()
    {
        $roles = Auth::user()->roles;
        $user = Auth::user();

        if ($roles == 'ROLE_STUDENT') {
            $course1 = Course::find(1);
            $course2 = Course::find(2);
            $isSubbed = Payment::where('user_id', $user->id)->whereDate('P_date', '>=', now()->subMonths(1))->exists();
            $coursePaid = Payment::where('user_id', $user->id)->first();
            $selectedTeacherId = Payment::where('User_id', $user->id)->value('Teacher_id');

            if($selectedTeacherId !== NULL){
                $teacher2 = User::find($selectedTeacherId)->value('name');
            }else{
                $teacher2 = "";

            }
            if (empty(StudentTeacher::all()->get(0))) {
                $teacher = null;
            }
            if (StudentTeacher::where('user_id', $user->id)->first() == null) {
                $teacher = null;
            } else {
                $teacher = User::find(StudentTeacher::where('user_id', $user->id)->first()->teacher_id);
            }
            return view('student.show')->with(['user' => $user,'teacher'=>$teacher2, 'isSubbed' => $isSubbed, 'coursePaid' => $coursePaid, 'course1' => $course1, 'course2' => $course2]);
        } else if ($roles == 'ROLE_ADMIN') {
            $users = User::where('roles', 'ROLE_STUDENT')->latest()->limit(4)->get();
            // $notSubbedUsers = $users->filter(function ($user) {
            //     return !Payment::where('user_id', $user->id)->exists();
            // })->values();
            return view('admin.show')->with(['user' => $user, 'users' => $users]);
        } else if ($roles == 'ROLE_TEACHER') {
            $studentIds = StudentTeacher::where('teacher_id', Auth::user()->id)->get()->pluck('user_id');
            $students = array();
            foreach ($studentIds as $id) {
                $student = User::find($id);
                array_push($students, $student);
            }
            return view('teacher.show')->with(['user' => $user, 'users' => $students]);
        }
    }

    public function getNotSubbedStudents(Request $request)
    {
        $users = User::where('roles', 'ROLE_STUDENT')->get();
        $notSubbedUsers = $users->filter(function ($user) {
            return !Payment::where('user_id', $user->id)->exists();
        })->values();

        $data = $notSubbedUsers;
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="/payment/{{ $user->id }}/approvepayment" class="btn btn-success">Approve
                    payment</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // public function getDailyReport()
    // {

    //     $today = now()->format('Y-m-d');
    //     $students = User::where('created_at', 'like', '%' . $today . '%')->get();
    //     $payments = Payment::where('created_at', 'like', '%' . $today . '%')->get();
    //     $numberOfStudent = $students->count();
    //     $totalAmount = $payments->sum('amount');

    //     $pdf = PDF::loadView('pdf.daily', compact('students', 'payments', 'numberOfStudent', 'totalAmount', 'today'));
    //     return $pdf->download('DailyReport-' . now() . '.pdf');
    // }

    // public function getWeeklyReport()
    // {

    //     $today = now()->addDays(1)->format('Y-m-d');
    //     $daysAgo = now()->subDays(7)->format('Y-m-d');
    //     $students = User::whereBetween('created_at', [$daysAgo, $today])->get();

    //     $payments = Payment::whereBetween('created_at', [$daysAgo, $today])->get();
    //     $numberOfStudent = $students->count();
    //     $totalAmount = $payments->sum('amount');

    //     $pdf = PDF::loadView('pdf.weekly', compact('students', 'payments', 'numberOfStudent', 'totalAmount', 'daysAgo'));
    //     return $pdf->download('WeeklyReport-' . now() . '.pdf');
    // }


    // public function getMonthlyReport()
    // {

    //     $today = now()->addDays(1)->format('Y-m-d');
    //     $daysAgo = now()->subDays(30)->format('Y-m-d');
    //     $students = User::whereBetween('created_at', [$daysAgo, $today])->get();

    //     $payments = Payment::whereBetween('created_at', [$daysAgo, $today])->get();
    //     $numberOfStudent = $students->count();
    //     $totalAmount = $payments->sum('amount');

    //     $pdf = PDF::loadView('pdf.monthly', compact('students', 'payments', 'numberOfStudent', 'totalAmount', 'daysAgo'));
    //     return $pdf->download('MonthlyReport-' . now() . '.pdf');
    // }

    public function getRangeReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $course = $request->course;
        $students = array();
        $teachers = array();
        $payments = "";
        if($course === 'all'){
            $payments = Payment::whereBetween('created_at', [$from, $to])->get();
            $numberOfStudent = User::where('roles','ROLE_STUDENT')->count();
            $students = User::where('roles','ROLE_STUDENT')->get();
            $totalAmount = Payment::sum('amount');
            $CourseName = "All Courses";
            foreach ($payments as $payment) {
                $teachers[] = User::where('id',$payment->teacher_id)->first();
            }
        }else{
            $totalAmount = 0;
            $CourseName = Course::where('id',$course)->value('name');
            $payments = Payment::whereBetween('created_at', [$from, $to])->where('Course_id',$course)->get();
            $numberOfStudent  = $payments->count();
            foreach ($payments as $payment) {
                $totalAmount = $totalAmount + $payment->amount;
                $students[] = User::where('id',$payment->User_id)->first();
                $teachers[] = User::where('id',$payment->teacher_id)->first();
            }
        }
         $pdf = PDF::loadView('pdf.range', compact('students','teachers', 'payments','CourseName', 'numberOfStudent', 'totalAmount', 'to', 'from'));
         return $pdf->download('Report-' . now() . '.pdf');
    }
}
