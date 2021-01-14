@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-3">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">
                    Actions
                </h3>
                <div>
                    <div class="list-group" id="list-tab" role="tablist">
                        <a
                            class="list-group-item list-group-item-action active"
                            href="{{ action('CourseController@index') }}"
                            >Courses</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            href="{{ action('TeacherController@index') }}"
                            >Teachers</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            href="{{ action('TeacherController@create') }}"
                            >Add a Teachers</a
                        >
                        {{--
                        <a
                            class="list-group-item list-group-item-action"
                            data-toggle="list"
                            href="#list-profile"
                            role="tab"
                            aria-controls="profile"
                            >Profile</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            data-toggle="list"
                            href="#list-messages"
                            role="tab"
                            aria-controls="messages"
                            >Messages</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            data-toggle="list"
                            href="#list-settings"
                            role="tab"
                            aria-controls="settings"
                            >Settings</a
                        >
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Save a Teacher</h3>
                <form action="/teachers/store" method="POST">
                    {{-- <form action={{url('/teachers/store')}} method="post"> --}}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Name:</label>
                                <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your name"
                                />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Email:</label>
                                <input
                                    name="email"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your Email"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>National ID:</label>
                            <input
                                name="nid"
                                type="text"
                                class="form-control"
                                placeholder="Your National ID"
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Address:</label>
                            <input
                                name="address"
                                type="text"
                                class="form-control"
                                placeholder="Your Address"
                            />
                        </div>
                    </div>
                    
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Telephone:</label>
                                <input
                                    name="telephone"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your phone number"
                                />
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Category:</label>
                                <input
                                    name="category"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your category name"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Driving License:</label>
                                <input
                                    name="drivinglicense"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your driving license"
                                />
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Plate number:</label>
                                <input
                                    name="plateNo"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your plate number for your car"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Cartype&Model:</label>
                                <input
                                    name="cartype"
                                    type="text"
                                    class="form-control"
                                    placeholder="Your car model"
                                />
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" value="save" />
                </form>
            </div>
        </div>
    </div>

    @endsection
</div>
