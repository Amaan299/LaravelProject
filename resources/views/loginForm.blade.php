<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a style="text-align: center;color: white" href="#">Attendance System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 10rem;">
            <h2 style="text-align: center;color: #8eb4cb" >Login Form</h2>
            <form  action="employee_markattend"  method="POST">
                {{--{{method_field('put')}}--}}
                {{csrf_field()}}
                <div class="mt-4">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="mt-2">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>

                <div class="mt-2">
                    <input class="btn btn-primary mt-4" type="submit" name="login" value="Login">
                </div>

            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>

</div>
</body>
</html>