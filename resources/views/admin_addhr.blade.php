@extends('layout')
@extends('admin_nav')
@section('addhr')
    <div class="employee-form">
        <div class="col-lg-4"></div>
        <form action="/admin_addhr" method="POST" class="col-lg-4">
            {{ csrf_field() }}
            <h4 class="text-center" style="color: #2a88bd">Employee Form</h4>
            <input type="hidden" id="id" name="id" >
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="user_name" id="username" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="dept" class="form-control" id="dept" placeholder="Department Name" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="salary" name="salary" placeholder="Salary" required="required">
            </div>
            <div class="form-group">
                <select name="designation" id="designation" class="designation dropdown dropdown-toggle dropdown-header" >
                    <option class="dropdown-item" value="">Select Designation</option>
                    <option class="dropdown-item" value="Ceo">ceo</option>
                    <option class="dropdown-item" value="HR">hr</option>
                    <option class="dropdown-item" value="Developer">developer</option>
                    <option class="dropdown-item" value="Manager">manager</option>
                </select>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="image" onchange="isSelected()" name="image" placeholder="Browse">
                <div id="imgSelected"></div>
            </div>
            <div class="form-group text-center">
                <button type="submit" id=submit" name="submit" class="btn btn-primary">Add Employee</button>

            </div>
        </form>
    </div>
@endsection