<?php session_start();
if(isset($_SESSION['id'])&&isset($_SESSION['user']) && $_SESSION['user']=="1"){
}
else{
    header("location: index.php");
}
?>