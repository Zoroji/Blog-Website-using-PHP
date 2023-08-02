<?php 

    include_once "../shared/connection.php";
    include "../shared/index.php";

    $blog_id = $_GET['blog_id'];

    $status = mysqli_query($conn,"select * from blog where blog_id = $blog_id");
    $res = mysqli_fetch_assoc($status);
    $blog_imgPath = $res['blog_imgPath'];
    $blog_heading = $res['blog_heading'];
    $blog_content = $res['blog_content'];
    $uploaded_by = $res['uploaded_by'];

    $selectPic = mysqli_query($conn,"select user_pic from user_blog where uname = '$uploaded_by';");
    $cursor2 = mysqli_fetch_assoc($selectPic);
    $user_pic = $cursor2['user_pic'];
    
?>

<html>
    <head></head>
    <body>
        
        <div class="my-5 container-fluid  d-flex justify-content-center flex-column align-items-center">

            <img src="<?php echo $blog_imgPath; ?> " alt="" style="width: 43rem;">
            <div class="my-5 text fw-bold fs-1"><?php echo $blog_heading; ?></div>
            <div class="text w-50 fs-4"><?php echo $blog_content; ?></div>
            
            <div class="mt-5 d-flex justify-content-between align-items-end gap-4">
            <img src="<?php echo $user_pic;?>" alt="" style="border-radius: 50%; width: 5rem;">
            <div class="d-flex flex-column">
            <p class=' fw-bold'>Author <?php echo $uploaded_by;?></p>
            <p class=' text-secondary-emphasis'><a href="<?php echo 'authorBlogs.php?uploaded_by='.$uploaded_by; ?>">Read more from <?php echo $uploaded_by;?></a></p>
            </div>
            
            </div>

            <button class='btn btn-primary mt-4'><a href="view.php">Go back</a></button>
            
        </div>
    </body>
</html>
