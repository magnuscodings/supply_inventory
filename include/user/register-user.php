<?php
    include("../connection.php");
    if(isset($_POST['email'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['pass1'];
        $user="1";

        $select="SELECT * from users where email ='$email' ";
        $insert="INSERT INTO users (user,name,email, password) 
        VALUES ('$user','$name','$email', '$password')";
         $result = $conn->query($select);
        $EMAIL="";
        while($row = $result->fetch_assoc()) { 
            $EMAIL =$row["email"]; 
        }
        if($email==$EMAIL){
            echo "<script>
                alert('Register Failed! Email Already Exists !');
                window.location.href='../../register.php';
                </script>";
            exit();
        }else if ($email!=$EMAIL){
            if($_POST['pass1']==$_POST['pass2']){
                if(mysqli_query($conn,$insert)){
                    echo "<script>
                        alert('Register Successfully!');
                        window.location.href='../../index.php';
                        </script>";
                }else{
                    echo "<script>
                        alert('Register Failed!');
                        window.location.href='../../register.php';
                        </script>";
                }
            }else{
                echo "<script>
                alert('Password is not the same!');
                window.location.href='../../register.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('An error has occured please contact the developer');
            window.location.href='../../register.php';
            </script>";
        }
    }else{
        echo"failed";
    }

?>
