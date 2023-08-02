<?php 

include_once "../shared/connection.php";
session_start();
$uname = $_SESSION['uname'];

$blog_heading = $_POST['blog_heading'];
$blog_content = $_POST['blog_content'];
$categories = $_POST['categories'];

$destFilePath = "../shared/images/".$_FILES['blog_imgPath']['name'];
move_uploaded_file($_FILES['blog_imgPath']['tmp_name'],$destFilePath);

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO blog (blog_heading, blog_content, blog_imgPath, uploaded_by, category) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $blog_heading, $blog_content, $destFilePath, $uname, $categories);

// Execute the statement
if ($stmt->execute()) {
    header("location: blogMain.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
