<?php 
include("include/authentication/status.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log in</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
<?php  include("include/connection.php");
?>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt=""></a>
          
        </div>
      </nav>
      <section>
        <div class="container-lg s2">
            <div class="row">
                <div class="col-lg-6 col1">
                    <h1> Log in</h1>
                    <form action="include/login.php" method="POST">
                    <input type="text" placeholder="Email" name="email" required> <br>
                    <input type="password" placeholder="Password" name="pass" required> <br>
                    <input type="submit" name="submit" value="LOG IN">
                    </form>
                    <br>
                    <p class="text-secondary link">
                        Don't have an account? 
                        <a href="register.php">SIGN UP</a>
                    </p>
                </div>
                <div class="col-lg-6 col2">
                    <h6 class="text-secondary" >
                    Good Day!, Welcome to our supply inventory System
                    </h6>
                </div>
            </div>
        </div>

      </section>
</body>
</html>