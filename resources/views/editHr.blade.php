@extends('layout')
@extends('admin_nav')

@section('edithr')
    <div class="employee-form">
        <div class="col-lg-4"></div>
        <form action="/admin_viewhr/{{$hr->id}}" style="margin-top: 10rem" method="POST" class="col-lg-4">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h4 class="text-center" style="color: #2a88bd">Edit HR</h4>
            <input type="hidden" id="id" name="id" >
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" value="{{$hr->name}}" required="required">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" value="{{$hr->email}}" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="user_name" id="username" class="form-control" value="{{$hr->username}}" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" value="{{$hr->password}}" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="dept" class="form-control" id="dept" value="{{$hr->departmentname}}" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="salary" name="salary" value="{{$hr->salary}}" required="required">
            </div>
            <div class="form-group">
                <select name="designation" value="{{$hr->designation}}" id="designation" class="designation dropdown dropdown-toggle dropdown-header" >
                    <option class="dropdown-item" value="Hr">Hr</option>
                    <option class="dropdown-item" value="Developer">Developer</option>
                    <option class="dropdown-item" value="Ceo">CEO</option>
                    <option class="dropdown-item" value="Manager">Manager</option>
                </select>
            </div>
            <div class="form-group">

                <img src="/images/{{$hr->cover}}" style="height: 40px;width: 40px; margin-bottom: 15px">
                <input type="file" class="form-control" id="image" onchange="isSelected()" name="image" placeholder="Browse">
                <div id="imgSelected"></div>
            </div>
            <div class="form-group text-center">
                <button type="submit" id=submit" name="submit" class="btn btn-primary">Edit Hr</button>
                <a href="/admin_viewhr" class="btn btn-success" name="back" value="Back">Back</a>
            </div>
        </form>
    </div>
@endsection