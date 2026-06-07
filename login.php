<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE username='$username'";
    $result=mysqli_query($conn,$sql);

    $user=mysqli_fetch_assoc($result);

    if($user && password_verify($password,$user['password']))
    {
        $_SESSION['user']=$username;
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

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
Blog Management System
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
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

<p class="text-center mt-3">

New User?

<a href="register.php">
Register Here
</a>

</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>