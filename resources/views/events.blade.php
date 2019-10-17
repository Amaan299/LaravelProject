@extends('employee_nav')
@extends('layout')

@section('calendar')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Time Calender</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <div class="">
                                <input type="text" class="form-control" name="event_name">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <div class="">
                                <input type="text" class="form-control" name="start_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <div class="">
                                <input type="text" class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="timein">Time In</label>
                            <div class="">
                                <input type="text" class="form-control" name="timein">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="timeout">Time Out</label>
                            <div class="">
                                <input type="text" class="form-control" name="timeout">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 text-center" style="margin-top: 25px">
                        <div class="form-group">
                            <div class="">
                                <input type="submit" class=" btn btn-primary" name="submit" value="Save">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection