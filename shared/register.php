<?php 
    session_start();
    include_once "connection.php";
    $_SESSION['login_status'] = false;
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];

    $res = mysqli_query($conn,"select * from user_blog where uname = '$uname'");
    
    if($res->num_rows>0)
    {
        $response = array('status'=>'error','message'=>'User name already exist ');
        echo json_encode($response);
    }
    else
    {
        $destFilePath = "../shared/userPic/".$_FILES['user_pic']['name'];
        move_uploaded_file($_FILES['user_pic']['tmp_name'],$destFilePath);

        $status = mysqli_query($conn,"Insert into user_blog(uname,upass,user_pic) values('$uname','$upass','$destFilePath')");
        $response = array('status'=>'success','message'=>'Successfully Registered!');
        echo json_encode($response);
        
    
        $_SESSION['uname'] = $uname;
        $_SESSION['upass'] = $upass;
        $_SESSION['login_status'] = true;
    }
?>