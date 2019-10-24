@extends('layout')
@extends('hr_nav')
@section('hrviewattend')
    <h1 style="text-align: center;color: #1f648b;margin-left: 100px">Employee Attendance <h1>
            <table class="table table-striped table-bordered table-hover text-center" style="margin-left: 250px;width: 80%">
                <thead >
                <tr >
                    <th style="text-align: center">Date</th>
                    <th style="text-align: center">Time In</th>
                    <th style="text-align: center">Time Out</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employee as $emp)
                    <tr>
                        <td> {{$emp->created_at}}  </td>
                        <td> {{ $emp->time_in}}  </td>
                        <td> {{ $emp->time_out}}  </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection