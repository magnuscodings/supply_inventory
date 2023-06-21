<?php 
include("include/authentication/admin-status.php");
include("include/connection.php");
$id=$_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Inventory</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/admin-inventory.css">
    <style>
      @media only screen and (max-width: 600px) {
    .table-responsive{
        width: 80%;
        margin-left: 10%;
        }
    }
    </style>
</head>
<body>
<?php include("include/navbar.php")?>
      <section>

<table class="table-responsive table-bordered mt-5 text-center">
  <tr class="bg-dark  text-light">
    <th>Item ID</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Value</th>
    <th>Action</th>
  </tr>
  <?php
      $select="Select * From items";
      $result = $conn->query($select);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $temp_id=$row['id'];
          ?>
      <tr>
        <th><?php echo $temp_id?></th>
        <th><?php echo $row['description']?></th>
        <th><?php echo $row['quantity']?></th>
        <th><?php echo "P".$row['value']?></th>
        <!-- <th><?php // echo "P".$row['date']?></th> -->

        <th>          
          <?php include("include/admin/admin-edit.php")?>
        </th>
        
      </tr>
 <?php
        }
      } else {
        echo "<td colspan='5' class='text-danger'>0 results</td>";
      }
  ?>
 
</table>

<div class="d-flex justify-content-center">
<?php include("include/admin/admin-add-item.php")?>
</div>
</section>
<br><br><br>
</body>
</html>