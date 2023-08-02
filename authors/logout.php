<?php
 session_start();
 session_destroy();
 header("location:../shared/view.php");
 ?>