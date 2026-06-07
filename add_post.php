<?php
include 'db.php';

if(isset($_POST['save']))
{
$title=$_POST['title'];
$content=$_POST['content'];

mysqli_query(
$conn,
"INSERT INTO posts(title,content)
VALUES('$title','$content')"
);

header("Location: dashboard.php");
}
?>

<form method="POST">

<input type="text"
name="title"
placeholder="Title">

<textarea
name="content">
</textarea>

<button name="save">
Save Post
</button>

</form>