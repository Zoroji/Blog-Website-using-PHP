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
            <form action="register.php" class="bg-warning-subtle p-2 w-25 rounded" method="post" onsubmit="return validate()" enctype="multipart/form-data">
                <img src="https://icon-library.com/images/icon-blog-png/icon-blog-png-12.jpg" alt="" style="width: 50px;height: 50px;" >
                <h3 class="my-4 text-center text-warning">Please Register Here</h3>
                <input required class="form-control" type="text" name="uname" id="uname" placeholder="enter name..">
                <input required class="form-control" type="password" name="upass" id="upass" placeholder="enter password..">
                <input required class="form-control" type="password" name="re-upass" id="re-upass" placeholder="re enter password..">
                <input required type="file" class="form-control mt-2" name="user_pic" >
                <button class="my-4 btn btn-primary">Register</button>
                <div class="fw-semi-bold fs-6 ">Click here if <a  href="loginMain.php">already registered?</a></div>
            </form>
    </div>


    <script>
        function validate()
        {
            p1 = document.getElementById("upass").value;
            p2 = document.getElementById("re-upass").value;
            if(p1!==p2){
                alert("passwords does not match"); return false;
            }
            else {
                fetch('register.php', {
                    method: "post",
                    body: new FormData(document.querySelector('form'))
                })
                .then(Response => Response.json())
                .then(data => {
                    
                    msg = data.message;
                    const errorMsg = document.getElementById('error-msg');
                    errorMsg.textContent = msg;
                    errorMsg.style.display = 'block';
                    if(data.status === 'error')
                    {
                        errorMsg.classList.add('alert-danger');
                    }
                    else
                    {
                        errorMsg.classList.add('alert-success');
                        setTimeout(() => {
                        window.location = "index.php";
                    }, 2000);
                    }
                    
                })
                
                   
                return false;
            }
        }
    </script>

</body>
</html>
