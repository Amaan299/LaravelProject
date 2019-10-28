@extends('layout')
@extends('hr_nav')
@section('hrviewattend')
    <h1 style="text-align: center;color: #1f648b;margin-left: 100px">Employee Attendance <h1>
            <table class="table table-striped table-bordered table-hover text-center" style="margin-left: 250px;width: 80%">
                <thead >
                <tr >
                    <th style="text-align: center">Name</th>
                    <th style="text-align: center">Date</th>
                    <th style="text-align: center">Time In</th>
                    <th style="text-align: center">Time Out</th>
                    <th colspan="2" style="text-align: center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employee as $emp)
                    <tr>
                        <td> {{$emp->emp_name}}  </td>
                        <td> {{$emp->mydate}}  </td>
                        <td> {{ $emp->time_in}}  </td>
                        <td> {{ $emp->time_out}}  </td>
                        <td>
                            <a href="/hr_viewattend/{{$emp->id}}/edit" class="btn btn-primary" name="update" value="Update">Update</a>
                        </td>
                        <td>
                            <form action="/hr_viewattend/{{$emp->id}}/delete" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" name="delete" value="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection