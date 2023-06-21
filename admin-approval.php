<?php 
include("include/authentication/admin-status.php");
include("include/connection.php");
$id=$_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Approval</title>
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
        width: 90%;
        margin-left: 5%;
        }
    } h5{
      border-radius: 5px;
    }
    </style>
</head>
<body>
<?php include("include/navbar.php")?>
      <section>
<div class="col-md mt-3 d-flex justify-content-center">
  <h5 class="bg-success p-2 ps-3 pe-3 text-light fw-normal">
    For Approvals
  </h5>
</div>

<table class="table-responsive table-bordered table-sm  mt-3 text-center">
  <tr class="bg-dark  text-light">
    <th>Approval ID</th>
    <th>Name of Requestor</th>
    <th>Item Request</th>
    <!-- <th>Item Value</th> -->
    <th>Item Quantity</th>
    <!-- <th>Item Total Value</th> -->
    <th>Location</th>
    <th>Remarks</th>
    <th>Action</th>
  </tr>
  <?php
      $select="SELECT a.*,b.name as username,c.description,c.quantity as qty
      FROM custodian as a 
      LEFT JOIN users as b 
      ON a.userID = b.id
      LEFT JOIN items as c
      ON a.itemID = c.id
      WHERE status='1'";
      $result = $conn->query($select);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $temp_id=$row['id'];
          $item=$row['itemID'];
          // ;
          $rqqty=$row['qty']-$row['quantity'];
          $update_item="UPDATE items SET quantity = '$rqqty' WHERE id ='$item'";
          ?>
      <tr>
        <th><?php echo $temp_id?></th>
        <th><?php echo $row['username']?></th>
        <th><?php echo $row['description']?></th>
        <th><?php echo $row['quantity']?></th>
        <th><?php echo "P".$row['location']?></th>
        <th><?php echo "P".$row['remarks']?></th>
        <th>          
          <?php  include("include/admin/admin-accept.php")?>
        </th>

        
      </tr>
 <?php
        }
      } else {
        echo "<td colspan='7' class='text-danger'>0 results</td>";
      }
  ?>
 
</table>


</section>

</body>
</html>