<?php

session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

include 'db.php';

$result=mysqli_query(
$conn,
"SELECT * FROM posts"
);

$total_posts=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container-fluid">

<h3 class="text-white">
Blog Management System
</h3>

<div>

<span class="text-white me-3">

Welcome,
<?= $_SESSION['user']; ?>

</span>

<a
href="logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</div>

</nav>

<div class="container mt-4">

<div class="row">

<div class="col-md-4">

<div class="card shadow stats-card">

<div class="card-body">

<h5>Total Posts</h5>

<h2>

<?= $total_posts; ?>

</h2>

</div>

</div>

</div>

</div>

<a
href="add_post.php"
class="btn btn-primary mt-4 mb-3">

+ Add New Post

</a>

<table class="table table-bordered table-hover shadow bg-white">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Title</th>
<th>Content</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['title']; ?></td>

<td><?= $row['content']; ?></td>

<td>

<a
href="edit_post.php?id=<?=$row['id'];?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete_post.php?id=<?=$row['id'];?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this post?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<footer class="text-center mt-5 mb-3 text-muted">

Blog Management System © 2026

</footer>

</body>
</html>