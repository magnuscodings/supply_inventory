<?php 
include("include/authentication/status.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/register.css">

</head>
<body>
<?php  include("include/connection.php");
// if(isset($_POST['submit'])){

// }
?>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt=""></a>
          
        </div>
      </nav>
 <form action="include/user/register-user.php" method="post">     
  <section>
        <div class="container register1">
            <h1>Register</h1>
            <div class="col-md register2">
                    <div class="row" >
                    <div class="row">
                        <div class="col-md">
                            <input type="name" class="form-control" placeholder="Name" name="name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Password" name="pass1" required>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Retype Password" name="pass2" required>
                        </div>
                    </div>
                   
                   <div class="row">
                    <div class="col-md submit">
                        <input type="submit" name="submit" class="form-control" value="SIGN UP">
                    </div>
               </div>
                    
            </div>
        </div>
      </section>
</form>
</body>
</html>