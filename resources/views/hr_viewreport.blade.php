@extends('layout')
@extends('hr_nav')
@section('hrviewreport')
    <h1 style="text-align: center;color: #1f648b;margin-left: 100px">Employee Attendance Report<h1>
            <div>
                <form class="go" action="/hr_viewattendofmonth" method="POST">
                    {{ csrf_field() }}
                    <button style="float:right;margin-right: 12rem;height: 50px;width: 5%;" type="submit" class="btn btn-info" name="go" value="Go">Go</button>
                    <input style="float: right;width: 270px;height: 50px" type="text" id="datepicker" name="daterange" />

                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap',
                            format: 'yyyy-mm-dd'
                        });
                    </script>

                </form>
            </div>
            <table class="table table-striped table-bordered table-hover text-center" style="margin-left: 250px;width: 80%">
                <thead >
                <tr >
                    <th style="text-align: center">Name</th>
                    <th style="text-align: center">Date</th>
                    <th style="text-align: center">Time In</th>
                    <th style="text-align: center">Status</th>
                    <th colspan="2" style="text-align: center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($report as $rep)
                    <tr>
                        <td> {{$rep->emp_name}}  </td>
                        <td> {{$rep->mydate}}  </td>
                        <td> {{ $rep->time_in}}  </td>
                        <td>  {{($rep->time_in > "11:00:00 AM" && $rep->time_in < "12:00:00 PM")? "Late" : "Leave"}} </td>
                        <td>
                            <form class="delete" action="/hr_viewreport/{{$rep->id}}/delete" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" name="delete" value="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <script>
                    $(".delete").on("submit", function(){
                        return confirm("Do you want to delete this item?");
                    });
                </script>
                </tbody>
            </table>
@endsection