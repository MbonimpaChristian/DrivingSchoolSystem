<div class="card" style=" background-color:orange;">
    <div class="card-body" style="color: black;">
        <h3 class="card-title">
            Actions
        </h3>
        <div>
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action"
                    href="{{ action('CourseController@index') }}">Courses</a>
                @if (Auth::user()->roles == 'ROLE_ADMIN')
                    @isset($course)
                        @if (Request::is('courses/*'))
                            <a class="list-group-item list-group-item-action"
                                href="{{ action('CourseController@addVideo', [$course->id]) }}">Add Video</a>
                        @endif
                    @endisset
                    <a class="list-group-item list-group-item-action"
                        href="{{ action('TeacherController@index') }}">Teachers</a>
                    @if (Request::is('teachers'))
                        <a class="list-group-item list-group-item-action"
                            href="{{ action('TeacherController@create') }}">Add a Teacher</a>
                    @endif
                    <a class="list-group-item list-group-item-action"
                        href="{{ action('StudentController@index') }}">Students</a>
                    <a class="list-group-item list-group-item-action" href="#" data-toggle="modal"
                        data-target="#exampleModal">Reports</a>
                    <a class="list-group-item list-group-item-action"
                        href="{{ action('test_resultController@index') }}">Test Result</a>
                @endif
               @if (\App\Payment::where('User_id',Auth::user()->id)->exists())
               <a class="list-group-item list-group-item-action"
               href="{{ action('TestQuestionController@test') }}">Test</a>
               @endif
            </div>
        </div>
    </div>
</div>
<div class="card mt-2" style="background-color: gray; color:white; opacity: 2.7em;">
    <div class="card-body">
        <h3 class="card-title">User Profile</h3>
        <h5 class="card-title">{{ Auth::user()->name }}</h5>
        <h6 class="card-subtitle mb-2 text-white">{{ Auth::user()->nid }}</h6>
        <p class="card-text">
            Email: {{ Auth::user()->email }} <br>
            Phone: {{ Auth::user()->telephone }}
            @if (Auth::user()->roles == 'ROLE_STUDENT')
                @php
                    $teacher = DB::table('student_teachers')
                        ->where('user_id', '=', Auth::user()->id)
                        ->first();
                @endphp
                @if ($teacher != null)
                    Teacher: {{ App\User::find($teacher->id)->name }}
                    Teacher Contact: {{ App\User::find($teacher->id)->telephone }}
                @endif
            @endif
        </p>
    </div>
</div>
