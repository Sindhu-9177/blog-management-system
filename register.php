<?php

include 'db.php';

if(isset($_POST['register']))
{
    $username=$_POST['username'];

    $password=password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $sql="INSERT INTO users(username,password)
    VALUES('$username','$password')";

    mysqli_query($conn,$sql);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow-lg login-card">

<div class="card-body">

<h2 class="text-center mb-4">
Create Account
</h2>

<form method="POST">

<input
type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button
name="register"
class="btn btn-success w-100">

Register

</button>

</form>

<p class="text-center mt-3">

Already have an account?

<a href="login.php">
Login
</a>

</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>