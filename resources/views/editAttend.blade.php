@extends('layout')
@extends('hr_nav')

@section('editattend')
    <div class="employee-form">
        <div class="col-lg-4"></div>
        <form action="/hr_viewattend/{{$hr->id}}" method="POST" class="col-lg-4">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h4 class="text-center" style="color: #2a88bd">Edit Attend</h4>
            <input type="hidden" id="id" name="id" >
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" value="{{$hr->emp_name}}" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="mydate" id="mydate" class="form-control" value="{{$hr->mydate}}" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="time_in" id="time_in" class="form-control" value="{{$hr->time_in}}" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="time_out" name="time_out" value="{{$hr->time_out}}" required="required">
            </div>
            <div class="form-group text-center">
                <button type="submit" id=submit" name="submit" class="btn btn-primary">Edit Employee</button>

            </div>
        </form>
    </div>
@endsection