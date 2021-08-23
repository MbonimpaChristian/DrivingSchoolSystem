
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card p-2 m-2">
                    <h2>Reports</h2>
                    <div class="d-flex justify-content-between flex-row">
                        <a href="{{ action('HomeController@getDailyReport') }}" class="btn btn-sm btn-primary">Daily
                            Report</a>
                        <a href="{{ action('HomeController@getWeeklyReport') }}" class="btn btn-sm btn-primary">Weekly
                            Report</a>
                        <a href="{{ action('HomeController@getMonthlyReport') }}" class="btn btn-sm btn-primary">Monthly
                            Report</a>
                    </div>
                </div>

                <div class="card p-2 m-2">
                    <h2>Reports By Date Range</h2>
                    <form action="/pdf/range" method="POST">
                        @csrf
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
