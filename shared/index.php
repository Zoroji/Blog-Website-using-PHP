<?php 

    session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog site</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    
    <style>
        *
        {
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }
        .drop-down-content
      {
        cursor: pointer;
        display:none;
        position: absolute;
        width:160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index:1;
      }
         .drop-down-content p
      {
        margin: 0;
        color:black;
        background-color: white;
        display:block;
        text-decoration:none;
        padding:12px 16px;
        border:1px solid black;
      }
      .drop-down-content p:hover {
            background-color: black;
            color: white;
        }
        .show
        {
            display: block;
        }
        nav
        {
            background-color: #F6F4EB;
            transition: 0.5s all ease-in-out;
        }
        nav ul,li,a{
    text-decoration: none;
    font-size: large;
    color:inherit;
}       
.navbar-toggle
      {
        background-color:white;
      }
    </style>
</head>
<body>

    <nav class="container-fluid d-flex  align-items-center sticky-top">
        <img src="https://icon-library.com/images/icon-blog-png/icon-blog-png-12.jpg" alt="" style="width: 40px;
    height:auto;" >
        <ul class=" d-flex mx-5 gap-5 mb-0 gap-3"  style="list-style: none;">
            <li><a href="../shared/view.php"><div class=" text-dark">HOME</div></a></li>
            <li><a href="../authors/blogMain.php"><div class=" text-dark">POST</div></a></li>
            <li><button onclick="toggleDropdown()" id="drop-down-btn" class="text-dark">Category</button>
            <div class="drop-down-content" id="drop-down-content">
  <p onclick="changeBtn(this)">All</p>
  <p onclick="changeBtn(this)">Travel</p>
  <p onclick="changeBtn(this)">Pets</p>
  <p onclick="changeBtn(this)">Fashion</p>
  <p onclick="changeBtn(this)">Ocean</p>
  </div>
  </li>
        </ul>
        <div class="ms-auto w-25 m-3 h-100"> 
            <input onkeypress="searchCard(this)" type="search" id="search" class="rounded-5 w-50 ps-3" placeholder="search" style="height:3.2rem;background-color:#F6F4EB">
        </div>
        <?php if(!isset($_SESSION['uname']) || !$_SESSION['uname']): ?>
        <div class="ms-auto">
            <a href="../shared/registerMain.php">
          <button class="btn btn-success">LOGIN/SIGNUP</button>
        </a>
        </div>
        <?php else: ?>
        <div class="ms-auto">
            <a href="../authors/logout.php">
          <button class="btn btn-danger">Logout</button>
        </a>
        </div>
        <?php endif; ?>
    </nav>
    
            

    <script>
        function toggleDropdown() {
    var dropdown = document.getElementById("drop-down-content");
    dropdown.classList.toggle("show");

}


function changeBtn(category)
{
    var button =document.getElementById('drop-down-btn');
    button.textContent = category.textContent;
    sortByCategory(button.textContent);
}
function sortByCategory(category) {
        
    }
    function navbarToggleBg() {
                navbar = document.querySelector('nav');
                if(window.scrollY>0)
                {
                   navbar.classList.add("navbar-toggle");
                }
                else{
                    navbar.classList.remove("navbar-toggle");
                }
            }

            window.addEventListener('scroll',navbarToggleBg);
            function searchCard(input) {
                console.log(input.value);
            }



    </script>
</body>
</html>