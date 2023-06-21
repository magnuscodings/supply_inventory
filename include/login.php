<?php
session_start();
include("connection.php");
if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=mysqli_real_escape_string($conn,$_POST['pass']);

    $select="SELECT * from users where email ='$email' ";
    $result = $conn->query($select);
    $EMAIL="";
    $PASS="";
    $id="";
    $user="";
    while($row = $result->fetch_assoc()) { 
        $EMAIL = $row["email"];
        $PASS = $row["password"];
        $id=$row["id"];
        $user=$row["user"];
        
    }
    if($email==$EMAIL&&$pass=$PASS){
        $_SESSION['user']=$user;
        $_SESSION['id']=$id;
        echo "<script>
            alert('Successfully login');
            window.location.href='../index.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Login Failed');
            window.location.href='../index.php';
            </script>";
        exit();
        }
}else{
    header("location: ../index.php");
}
?>