<?php 
    include_once "../shared/index.php";
    include "../shared/connection.php";

    $blog_id = $_GET['blog_id'];
    $res = mysqli_query($conn,"select * from blog where blog_id = $blog_id ");
    $row = mysqli_fetch_assoc($res);
    $blog_heading = $row['blog_heading'];
     $blog_content = $row['blog_content'];
      $blog_imgPath = $row['blog_imgPath'];

?>

<html>
    <head>
    </head>
    <body>
    <div class="container-fluid d-flex justify-content-center flex-row vh-100">
            
            <!-- form for blog -->
            
            <form  action="edit.php?blog_id=<?php echo $blog_id; ?>" class=" bg-warning-subtle p-2 w-50  m-4  rounded" method="post" enctype="multipart/form-data" >
                <img src="https://icon-library.com/images/icon-blog-png/icon-blog-png-12.jpg" alt="" style="width: 50px;height: 50px;" >
                <h3 class="my-4 text-center text-warning">Edit your Blog</h3>
                <hr class="border border-warning border-2 opacity-50">
                <input required class="form-control mt-2 " type="text" name="blog_heading"  placeholder="HEADING...." value="<?php  echo $blog_heading;  ?>">
                <textarea required class="form-control mt-2 h-50" type="text" name="blog_content"  placeholder="CONTENT......"><?php  echo $blog_content;  ?></textarea>
                <select name="categories" id="" class="form-control mt-2 ">
                <option value="Pets">Pets </option>
                <option value="Travel">Travel </option>
                <option value="Fashion">Fashion </option>
                <option value="Ocean">Ocean </option>
               </select>
                <input required type="file" class="form-control mt-2" name="blog_imgPath" >
                <hr class="border border-warning border-2 opacity-50">
                <button class="btn btn-primary">Post</button>
            </form>
            </div>
    </body>
</html>