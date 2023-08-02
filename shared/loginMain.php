<?php include "index.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        body
        {
            height: 100%;
            width: 100%;
            margin: 0; padding:0;
            background-image: url("https://i.ytimg.com/vi/3TpQ7L3Ywvg/maxresdefault.jpg");
            background-repeat: no-repeat;
           background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid  d-flex justify-content-center align-items-center  flex-column vh-100">
        <div id="error-msg" class="alert  w-25" style="display:none;"></div>
            <form action="login.php" class="bg-warning-subtle p-2 w-25 rounded" method="post" onsubmit="return validate()">
                <img src="https://icon-library.com/images/icon-blog-png/icon-blog-png-12.jpg" alt="" style="width: 50px;height: 50px;" >
                <h3 class="my-4 text-center text-warning">Login Here</h3>
                <input required class="form-control" type="text" name="uname" id="uname" placeholder="enter name..">
                <input required class="form-control" type="password" name="upass" id="upass" placeholder="enter password..">
                <button class="my-4 btn btn-primary">Login</button>
                <div class="fw-semi-bold fs-6 ">Click here if <a  href="registerMain.php">you have not registered</a></div>    
            </form>
    </div>


    <script>
        function validate()
        { 
               fetch('login.php',{
                method:'post',
                body:new FormData(document.querySelector('form'))
               })
               .then(response =>response.json())
               .then(data=>{

              const error_msg =document.getElementById('error-msg');
               
              error_msg.textContent = data.message;
                error_msg.style.display = 'block';
               
                if (data.status === 'success') {
                    error_msg.classList.add('alert-success');
                    setTimeout(()=>{
                        window.location = "view.php";
                    },2000)
                }
                else{
                    error_msg.classList.add("alert-danger");
                }

               })
                
                   
                return false;
            
        }
    </script>

</body>
</html>
