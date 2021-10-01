<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('roles', 'ROLE_TEACHER')->get();
        return view('teacher.teacherlist')->with(['teachers'=> $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.createteacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'category' => 'required',
            'drivinglicense' => 'required',
            'plateNo' => 'required',
            'cartype' => 'required',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nid' => $request->input('nid'),
            'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),
            'category' => $request->input('category'),
            'drivinglicense' => $request->input('drivinglicense'),
            'plateNo' => $request->input('plateNo'),
            'cartype' => $request->input('cartype'),
            'password' => Hash::make($request->input('email')),
            'roles'=> 'ROLE_TEACHER'
        ]);

        $teachers = User::where('roles', 'ROLE_TEACHER')->get();
        return view('teacher.teacherlist')->with(['teachers'=> $teachers]);
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
        $teacher= User::find($id);
        return view('teacher.editteacher', ['teacher' => $teacher]);

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
        $teacher = User::find($id);
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->nid = $request->input('nid');
        $teacher->address = $request->input('address');
        $teacher->telephone = $request->input('telephone');
        $teacher->category = $request->input('category');
        $teacher->drivinglicense = $request->input('drivinglicense');
        $teacher->plateNo = $request->input('plateNo');
        $teacher->cartype = $request->input('cartype');

        $teacher->save();
        return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teachers = User::find($id);
        $teachers->deleted();
        return redirect('/teachers');
    }
}
