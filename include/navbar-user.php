<?php  include("include/connection.php");
?>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="index.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user-request.php">Request</a>
              </li>
              <li class="nav-item">
                <a href="include/logout.php" class="nav-link">LOG OUT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>