<?php 

    include_once "../shared/connection.php";
    $blog_id = $_GET['blog_id'];

    $status= mysqli_query($conn,"delete from blog where blog_id=$blog_id");
    header("location:blogMain.php");
?>

