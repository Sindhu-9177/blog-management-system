<?php

include 'db.php';

$id=$_GET['id'];

$post=mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM posts
WHERE id=$id"
)
);

if(isset($_POST['update']))
{
$title=$_POST['title'];
$content=$_POST['content'];

mysqli_query(
$conn,
"UPDATE posts
SET title='$title',
content='$content'
WHERE id=$id"
);

header("Location: dashboard.php");
}
?>

<form method="POST">

<input type="text"
name="title"
value="<?= $post['title']; ?>">

<textarea
name="content">
<?= $post['content']; ?>
</textarea>

<button name="update">
Update
</button>

</form>