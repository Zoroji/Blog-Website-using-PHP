<?php 

    include_once "../shared/connection.php";
    include "../shared/index.php";

    $uploaded_by = $_GET['uploaded_by'];

?>
<div class="p-5 container-fluid  w-100 ">
        <div class="text-center">All post from <?php echo $uploaded_by; ?></div>
        <div class="cardDeck rounded mx-auto  w-75">
        <?php 
           
           $cursor = mysqli_query($conn,"select * from blog where uploaded_by = '$uploaded_by'");
            
            echo "<div class=' p-5 d-flex flex-wrap gap-3'>";
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
                <img src='$blog_imgPath' class='card-img-top' alt='...' style='object-fit: contain;border:none;'>
         <div class='card-body border-none'>
           <h5 class='card-title mb-4'>$blog_heading</h5>
           <p class='category'>🏷️$category</p>
           <p class='mb-2'>$formatted_date</p>
           <p class='card-text pb-3'>$blog_content</p>
           <div class='position-absolute bottom-0 mb-2 d-flex flex-row'>
           <a href='viewBlog.php?blog_id=$blog_id' class=' fw-semibold text-dark text-decoration-none' >read more</a>
           </div>
         </div>
         </div>";
            }
            echo "</div>";


         ?>   
           

        </div>
        </div>


        <script>

            function sortByCategory(category)
            {       

                cards =document.querySelectorAll(".card");

                if(category === "All") 
                {
                    cards.forEach(card=>{
                        card.style.display = "block";
                    });
                }else{
                
                cards.forEach(card => {
                    cardCategory = card.querySelector(".category").textContent;
                    if(cardCategory.includes(category))
                    {
                        card.style.display = "block";
                    }
                    else{
                        card.style.display = "none";
                    }
                });
            }

            }

        </script>