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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Attendance System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="login.php">Home <span class="sr-only">(current)</span></a>
            </li>

        </ul>

    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <h2 style="color: blue">Login Form</h2>
            <form action="employee_markattend" method="POST">
                {{--{{method_field('put')}}--}}
                {{csrf_field()}}
                <div class="mt-4">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="mt-2">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="mt-2">
                    <select autofocus class="form-control" type="text" name="designation" >
                        <option  value="none" >--- Select One ---</option>
                        <option  value="hr" >hr</option>
                        <option  value="developer">developer</option>
                        <option value="ceo">ceo</option>
                    </select>
                </div>
                <div class="mt-2">
                    <input class="btn btn-primary mt-4" type="submit" name="login" value="Login">
                </div>

            </form>
        </div>


    </div>

</div>
</body>
</html>