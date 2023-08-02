<?php 

include "../shared/connection.php";

$blog_id = $_GET['blog_id'];
$blog_heading = $_POST['blog_heading'];
$blog_content = $_POST['blog_content'];
$category = $_POST['categories'];

$destFilePath = "../shared/images/".$_FILES['blog_imgPath']['name'];
move_uploaded_file($_FILES['blog_imgPath']['tmp_name'],$destFilePath);

$status = mysqli_query($conn, "UPDATE blog SET blog_heading = '$blog_heading', blog_content = '$blog_content',blog_imgPath = '$destFilePath',category = '$category' WHERE blog_id = $blog_id");

header("location:blogMain.php");

?>