<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Payment;
use App\Video;
use Auth;
use FFMpeg;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $user = Auth::user();
        $isAuthAdmin = $user->roles == "ROLE_ADMIN";
        $isSubbed = Payment::where('user_id', $user->id)->exists();
        return view('course.courselist', ['courses' => $courses, 'user' => $user, 'isSubbed' => $isSubbed, 'isAuthAdmin' => $isAuthAdmin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        return view('course.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->input('name');
        $course->price = $request->input('price');
        $course->save();
        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $user = Auth::user();
        $provisionalVideo = Video::where('Course_id', 1)->get();
        $drivingLicenseVideo = Video::where('Course_id', 2)->get();
        return
            view('course.course')->with(['user' => $user, 'course' => $course, 'provisionalVideo' => $provisionalVideo, 'drivingLicenseVideo' => $drivingLicenseVideo]);
    }

    public function addVideo($id)
    {
        return view('video.create')->with(['id' => $id]);
    }


    public function storeVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4'
        ]);

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $path = public_path() . '\\video\\';

            $file->move($path, $filename);

            Video::create([
                'course_id' => $request->input('course_id'),
                'name' => $file->getClientOriginalName(),
                'duration' => $request->input('duration')
            ]);
        }
        return view('video.create')->with(['id' => $request->input('course_id') ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('course.edit', ['course' => $course]);
    }

    public function delete($id)
    {
        $course = Course::find($id);
        // destroy();
        // return view('course.edit', ['course' => $course]);
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
        $course = Course::find($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $course->name = $request->input('name');
        $course->price = $request->input('price');
        $course->save();
        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->deleted();
        return redirect('/courses');
    }
}
