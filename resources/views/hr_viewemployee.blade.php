
@extends('layout')
@extends('hr_nav')

@section('viewemployee')

        <h1 style="text-align: center;color: #1f648b;margin-left: 100px">Information of Employees</h1>
        <table class="table table-striped table-bordered table-hover text-center" style="margin-left: 250px;width: 80%">
            <thead class="text-center">
            <tr>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">Email</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Salary</th>
            <th style="text-align: center">Department</th>
            <th style="text-align: center">Designation</th>
            <th style="text-align: center">Cover</th>
            <th colspan="2" style="text-align: center">Actions</th>
            </tr>
        </thead>
   <tbody>
       @foreach($employee as $emp)
            <tr>
                <td> {{ $emp->name}}  </td>
                <td> {{ $emp->email}}  </td>
                <td> {{ $emp->username}}  </td>
                <td> {{ $emp->salary}}  </td>
                <td> {{ $emp->departmentname}}  </td>
                <td> {{ $emp->designation}}  </td>
                <td><img src="images/{{$emp->cover}}" style="width: 40px;height: 35px" ></td>
                <td>
                    <a href="/hr_viewemployee/{{$emp->id}}/edit" class="btn btn-primary" name="update" value="Update">Update</a>
                </td>
                <td>
                    <form class="delete" action="/hr_viewemployee/{{$emp->id}}/delete" method="POST">
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

