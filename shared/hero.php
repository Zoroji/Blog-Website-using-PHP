<?php include_once "../shared/connection.php";?>


<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>
        
    </title>
    <style>
        .hero{
            width:100%;height:100vh;background-image:url('https://static.wixstatic.com/media/ee7f6b_27627cc38d6d4e54b8648acc3b103e81~mv2_d_6000_4000_s_4_2.jpg/v1/fill/w_1858,h_1050,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/ee7f6b_27627cc38d6d4e54b8648acc3b103e81~mv2_d_6000_4000_s_4_2.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0.8;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .hero p{
            color:white;
            font-weight: 100;
            font-size: 5rem;
            font: bold;
            background-color: rgba(0, 0, 0, 0.688);
            padding: 30px;
        }
        .past-blog{
            width: 100%;
            margin-top:5rem;
            background-color: #EEEDED;
        }
        .past-blog h3{
            margin-left: 46%;
       
            font-size: 2.2rem;
        }
        hr{
            border-width: 2px;
            margin-top:-2px
        }
    </style>
</head>
<body>
    <div  class="hero">
        <p>WELCOME TO THE BLOG SITE</p>
    </div>

    <div class="past-blog">
    <hr>
        <h3>PAST BLOGS</h3>
        <div class="cardDeck w-100 ">
        <?php 
           
            $cursor = mysqli_query($conn,"SELECT * from blog ORDER BY created_date DESC limit 3; ");
            
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
                
                if(strlen($blog_content)>120)
                {
                    $blog_content = substr($blog_content,0,120);
                    $blog_content.='.....';
                }
                

                echo "  
                <div  class='card' style='width:300px;background-color:white;'>
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
    <hr>
</body>
</html>