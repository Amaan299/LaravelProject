
@extends('layout')
@extends('admin_nav')

@section('viewhr')
            <h1 style="text-align: center;color: #1f648b;margin-left: 100px">Information of HRs</h1>
            <table class="table table-striped table-bordered table-hover text-center" style="margin-left: 250px;width: 80%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Salary</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Cover</th>
                    <th colspan="2" style="text-align: center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hr as $emp)
                    <tr>
                        <td> {{ $emp->name}}  </td>
                        <td> {{ $emp->email}}  </td>
                        <td> {{ $emp->username}}  </td>
                        <td> {{ $emp->salary}}  </td>
                        <td> {{ $emp->departmentname}}  </td>
                        <td> {{ $emp->designation}}  </td>
                        <td><img src="images/{{$emp->cover}}" style="width: 40px;height: 35px" ></td>
                        <td>
                            <a href="/admin_viewhr/{{$emp->id}}/edit" class="btn btn-primary" name="update" value="Update">Update</a>
                        </td>
                        <td>
                            <form class="delete" action="/admin_viewhr/{{$emp->id}}/delete" method="POST">
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