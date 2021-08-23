@extends('layouts.app') @section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Save a video</h3>
            <form action="/courses/video/store" method="POST" enctype="multipart/form-data">
                {{-- <form action={{ url('/teachers/store') }} method="post">
                    --}}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input name="course_id" type="hidden" class="form-control" value="{{ $id }}" />
                            <div class="form-group">
                                <label>Video duration:</label>
                                <input name="duration" type="text" class="form-control" placeholder="video duration..." />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>video:</label>
                                <div class="custom-file">
                                    <input type="file" name="video" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info" value="save" />
                </form>
        </div>
    </div>

@endsection
