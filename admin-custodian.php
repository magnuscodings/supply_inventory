<?php 
include("include/authentication/admin-status.php");
include("include/connection.php");
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Custodian</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/admin-inventory.css">
</head>
<body>
<?php include("include/navbar.php")?>
      <section>
<!-- Search bar -->
<form action="#" method="POST">
  <div class="col-md ms-2 mt-2 d-flex justify-content-center searchbar">
    <input type="search" placeholder="Search item" name="Search-Item" class="form-control me-1">
    <input type="submit" name="searchItem" class="form-control" value="Search">
  </div>
</form>
<!-- Table -->
<div id="printmoko">
<table border="1px" class="table-responsive table-bordered table-sm mt-3 text-center" >
  <tr class="bg-dark  text-light">
    <th>Custodian ID</th>
    <th>Custodian Name</th>
    <th>Description</th>
    <th>Location</th>
    <th>Quantity</th>
    <th>Unit Value</th>
    <th>Total Value</th>
    <th>Remarks</th>
    <th>Date</th>
    <!-- <th>Action</th> -->
  </tr>
  <?php
      if(isset($_POST['Search-Item'])){
          $search_it=mysqli_real_escape_string($conn,$_POST['Search-Item']);
          $search_item= $search_it."%";
          $search="SELECT a.*,b.value as initVal,b.description,b.value,c.name as username, b.quantity as qtyLeft FROM custodian as a LEFT JOIN items as b ON a.itemID=b.id LEFT JOIN users as c ON a.userID = c.id WHERE a.status ='2' AND ( b.description='$search_item' or a.userID like '$search_item' or c.name like '$search_item' or b.description like '$search_item'  or a.location like '$search_item' or a.remarks like '$search_item') ORDER BY id";
          $result = $conn->query($search);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $totalVal=$row['quantity']*$row['value'];
         
          ?>
      <tr>
        <th><?php echo $row['id']?></th>
        <th><?php echo $row['username']?></th>
        <th><?php echo $row['description']?></th>
        <th><?php echo $row['location']?></th>
        <th><?php echo $row['quantity']?></th>
        <th><?php echo "P".$row['initVal']?></th>
        <th><?php echo "P".$totalVal?></th>
        <th><?php echo $row['remarks']?></th>
        <th><?php echo $row['date']?></th>

        
      </tr>
 <?php
        }
      } else {
        echo "<td colspan='9' class='text-danger'>0 results</td>";
      }
      }
      else{
        $select="SELECT a.*,b.value as initVal,b.description,b.value,c.name as username,b.quantity as qtyLeft FROM custodian as a LEFT JOIN items as b ON a.itemID=b.id LEFT JOIN users as c ON a.userID = c.id where status ='2'";
        $result = $conn->query($select);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $totalVal=$row['quantity']*$row['value'];
          $temp_id=$row['id'];
          
          ?>
      <tr>
        <th><?php echo $row['id']?></th>
        <th><?php echo $row['username']?></th>
        <th><?php echo $row['description']?></th>
        <th><?php echo $row['location']?></th>
        <th><?php echo $row['quantity']?></th>
        <th><?php echo "P".$row['initVal']?></th>
        <th><?php echo "P".$totalVal?></th>
        <th><?php echo $row['remarks']?></th>
        <th><?php echo $row['date']?></th>

        <!-- <th><?php // include("include/admin/admin-edit-custodian.php")?></th> -->
      </tr>
      
 <?php
        }
      } else {
        echo "<td colspan='9' class='text-danger'>0 results</td>";
      }
    }
  ?>
      </div>
 
</table></div>
<div class="col-md text-center mt-2">
<?php include("include/admin/admin-add-custodian.php")?>
</div>
</section>
<div class="col-md text-center mt-1">
  <input type="button" class="btn btn-primary" onclick="printDiv('printmoko')" value="Print">
</div>
<br><br><br>
</body>
</html>

<script>
  function printDiv(divname){
    var printContents=document.getElementById(divname).innerHTML;
    w=window.open();
    w.document.write(printContents);
    w.print();
    w.close();
  }
</script>