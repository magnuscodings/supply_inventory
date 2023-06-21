<?php session_start();
if(isset($_SESSION['id'])&&isset($_SESSION['user']) && $_SESSION['user']=="1"){
    header("location: user-dashboard.php");
    // echo"login user";
}else if(isset($_SESSION['id'])&&isset($_SESSION['user']) && $_SESSION['user']=="2"){
    header("location: admin-dashboard.php");
    // echo"login doctor";
}
else{
    // echo"not login";
}
?>