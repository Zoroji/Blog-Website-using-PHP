<?php 
include "index.php";
include "../shared/hero.php";
include_once "../shared/connection.php";

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
    </head>


    <body>
        <div class="p-5 container-fluid  w-100 ">
        <div class="cardDeck w-100 ">
        <?php 
           
            $cursor = mysqli_query($conn,"select * from blog ");
            
            echo "<div class='mx-auto p-5 d-flex justify-content-center flex-wrap gap-3 '>";
            while($row = mysqli_fetch_assoc($cursor))
            {
                $blog_id = $row['blog_id'];
                $blog_heading = $row['blog_heading'];
                $blog_content = $row['blog_content'];
                $blog_imgPath = $row['blog_imgPath'];
                $created_date = $row['created_date'];
                $formatted_date = date('j M Y', strtotime($created_date));
                $category = $row['category'];
                
                if(strlen($blog_content)>200)
                {
                    $blog_content = substr($blog_content,0,200);
                    $blog_content.='.....';
                }
                

                echo "  
                <div  class='card' style='width:500px;'>
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



        <div class="footer w-100 bg-dark d-flex">
          <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="" class="w-50">
        <div class="d-flex justify-content-center align-items-center flex-column text-white w-50 p-5 gap-4">
          <div class="text mx-auto fw-bold fs-1">ABOUT US</div>
          <div class="text w-75 fs-5">Our mission is to provide you with thought-provoking and enjoyable content that sparks conversations and fosters a sense of community. We believe in the power of storytelling and its ability to connect people from different backgrounds, cultures, and experiences.</div>
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
            function searchCard(input) {
              searchWord = input.value.toLowerCase();
              cards = document.querySelectorAll(".card");
              cards.forEach(card=>{
              title =  card.querySelector(".card-body .card-title").textContent.toLowerCase(); 
                if(title.includes(searchWord))
                {   
                    card.style.display = "block";
                }else{
                   
                    card.style.display = "none";
                }
            })
            }

           
        </script>
    </body>
</html>
