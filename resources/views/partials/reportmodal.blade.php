
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="card p-2 m-2">
                    <h2>Reports data By Date Range</h2>
                    <form action="/pdf/range" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Select Course</label>
                            <select class="form-control" name="course" id="exampleFormControlSelect2">
                                <option value="all">all courses</option>
                              @foreach(\App\Course::all() as $course)
                                 <option value="{{$course->id}}">{{$course->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">From:</label>
                            <input name="from" type="date" class="form-control" placeholder="From">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">To:</label>
                            <input name="to" type="date" class="form-control" placeholder="To">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
