<?php 
include_once "../shared/index.php";
include "../shared/connection.php";


?>

<html>
    <head>

    <style>
       .card
       {
        background-color:#F6F4EB;
        transition:all 2s ease-in;
        
       }
       .card :hover{
        transform: scale(1.01);
        background-color: #f8f9fa;
       }
       
    </style>
        <body>
        
      <?php  if(!isset($_SESSION['uname']) || !$_SESSION['uname']): ?>
        <div class="container-fluid h-50 p-5 bg-primary-subtle text-center">
            You need to signup or login first 
            
        </div> 
        <?php else: ?>  

            <div class=" d-flex py-2 justify-content-center gap-2 ">
                <button  class="btn btn-primary " onclick="toggle(this)" >My blog</button>
                
        </div>


            <div id='form' style="display: block;">
            <div class="container-fluid d-flex justify-content-center flex-row vh-100">
            
            <!-- form for blog -->
            
            <form  action="blog.php" class=" bg-warning-subtle p-2 w-50 h-100 m-4  rounded" method="post" enctype="multipart/form-data" >
                <img src="https://icon-library.com/images/icon-blog-png/icon-blog-png-12.jpg" alt="" style="width: 50px;height: 50px;" >
                <h3 class="my-4 text-center text-warning">Compose a blog here</h3>
                <hr class="border border-warning border-2 opacity-50">
                <input required class="form-control mt-2 " type="text" name="blog_heading"  placeholder="HEADING....">
                <textarea required class="form-control mt-2 h-50" type="text" name="blog_content"  placeholder="CONTENT......"></textarea>
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
            </div>

                <!-- blog card -->
         <?php 
            $uname = $_SESSION['uname'];

            $cursor = mysqli_query($conn,"select * from blog where uploaded_by = '$uname'");
            echo "<div id='card'  style='display:none; margin:4rem auto;width:75%;'>";
            echo "<div class='mx-auto d-flex flex-wrap gap-3'>";
            while($row = mysqli_fetch_assoc($cursor))
            {
                $blog_id = $row['blog_id'];
                $blog_heading = $row['blog_heading'];
                $blog_content = $row['blog_content'];
                $blog_imgPath = $row['blog_imgPath'];
                $created_date = $row['created_date'];
                $formatted_date = date('j M Y', strtotime($created_date));
                $category = $row['category'];
                
                if(strlen($blog_content)>120)
                {
                    $blog_content = substr($blog_content,0,120);
                    $blog_content.='.....';
                }
                

                echo "  
                <div  class='card' style='width:300px;'>
                <img src='$blog_imgPath' class='card-img-top aspect-ratio-contain' alt='...' style='object-fit: contain;'>
         <div class='card-body'>
           <h5 class='card-title mb-4'>$blog_heading</h5>
           <p class='category'>🏷️$category</p>
           <p class='mb-2'>$formatted_date</p>
           <p class='card-text pb-3'>$blog_content</p>
           <div class='position-absolute bottom-0 mb-2 d-flex flex-row'>
           <a href='../shared/viewBlog.php?blog_id=$blog_id' class=' fw-semibold text-dark text-decoration-none' >read more</a>
            <a href = 'editMain.php?blog_id=$blog_id' class='ms-5 btn btn-warning text-success'>EDIT</a>
            <button onclick='Delete($blog_id)' class='ms-2 btn btn-danger text-primary'>DELETE</button>
           </div>
         </div>
         </div>";
            }
            echo "</div> </div>";


         ?>   
           

      

            <?php endif; ?>

            <script>
               function toggle(button) {
        card = document.getElementById('card');
        form = document.getElementById('form');

        if (form.style.display === 'block') {
            form.style.display = 'none';
            card.style.display = 'block';
            button.innerText = 'Upload a Blog';

        } else {
            form.style.display = 'block';
            card.style.display = 'none';
            button.innerText = 'My Blogs';
        }
    }


    function Delete(blog_id)
    {
        res =confirm("Are you sure you want to remove ");
        if(res)
        {
            window.location.href = "deleteBlog.php?blog_id="+blog_id;
        }
    }
    function sortByCategory(category) {
    cards = document.querySelectorAll(".card");
    cards.forEach((card) => {
        cardCategory = card.querySelector(".category").textContent;
        if (category === "All" || cardCategory.includes(category)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}


    
    
            </script>
        </body>
    </head>
</html>