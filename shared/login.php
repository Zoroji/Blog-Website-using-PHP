<?php 
    session_start();
    $_SESSION['login_status'] = false;

    include_once "connection.php";

    $uname = $_POST['uname'];
    $upass = $_POST['upass'];

    $res = mysqli_query($conn, "SELECT * FROM user_blog WHERE uname = '$uname' AND upass = '$upass'");
    
    if ($res->num_rows > 0) {
        $response = array('status' => 'success', 'message' => 'You have logged in');
        echo json_encode($response);
        $_SESSION['login_status'] = true;
        $_SESSION['uname'] = $uname;
        $_SESSION['upass'] = $upass;
    } else {
        $response = array('status' => 'error', 'message' => 'Incorrect credentials');
        echo json_encode($response);
        
    }
?>
