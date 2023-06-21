<?php
if(isset($_POST['submit2'])){
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $item_id = $_POST['item_id'];
  $description = $_POST['description'];
  $quantityLeft = $_POST['quantityLeft'];
  $value = intval($_POST['value']);
  $quantity = intval($_POST['quantity']);
  $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
  $location = mysqli_real_escape_string($conn,$_POST['location']);
  $status = "2";
  $value*=$quantity;
  if($quantityLeft>=$quantity){
    $quantityLeft-=$quantity;
    try{
      $insert = mysqli_query($conn,"INSERT INTO custodian (userID,status, itemID,location,quantity,remarks) VALUES ('$name','$status', '$item_id','$location','$quantity','$remarks')");
    if($insert){
      $update="UPDATE items SET quantity = '$quantityLeft' WHERE description = '$description'";
      mysqli_query($conn,$update)or die(mysqli_error($conn));

      echo "<script>
      alert('Success !');
      window.location.href='';
      </script>";
    }else{
      echo "<script>
      alert('Failed !');
      window.location.href='';
      </script>";
    }
    }catch(Exception $e) {
      echo "<script>
      alert('Failed Adding Custodians!');
      window.location.href='';
      </script>";
    }
  }else{
    echo "<script>
  alert('Failed too much Quantity !');
  window.location.href='';
  </script>";
  }
  
}
?>
<!-- Button trigger modal -->
        <button type="button" class="btn btn-success mt-2 ms-2" data-bs-toggle="modal" data-bs-target="#AddModal">
Add Custodian
</button>
<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add Supplies and Equipments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST">
      <div class="modal-body">
      <!-- <input type="text" name="name" class="form-control mb-2" placeholder="Add Name of Custodian" title="Add Name of Custodian" required> -->
      <select name="name" id="" class="form-control mb-2" required>
            <option value="">Select Name</option>
            <?php
                  $select="Select * From users";
                  $result = $conn->query($select);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    
                    while($row = $result->fetch_assoc()) {
                      ?>
                  
                  <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                      
            <?php
                    }
                  } else {
                    echo "<option>0 results</option>";
                  }
                  echo "</select>";
            ?>  
      
      <select name="" id="dropdown" class="form-control" required>
            <option value="">Select Item</option>
            <?php
                  $select="Select * From items";
                  $result = $conn->query($select);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    
                    while($row = $result->fetch_assoc()) {
                      ?>
                  
                  <option value="<?php echo $row['id']?>/<?php echo $row['value']?>/<?php echo $row['quantity']?>/<?php echo $row['description']?>"><?php echo $row['description']?></option>
                      
            <?php
                    }
                  } else {
                    echo "<option>0 results</option>";
                  }
                  echo "</select>";
            ?>
        <input type="hidden" id="item_ids" name="item_id">
        <input type="hidden" id="description" name="description">
        <input type="hidden" id="quantity" name="quantityLeft">
        <input type="hidden" id="value" name="value">
       <input type="text" name="location" class="form-control mt-2" placeholder="Add Location" title="Add Location" required>
        <input type="number" min="1" name="quantity" class="form-control mt-2 mb-2" placeholder="Add Quantity" title="Add Quantity" required>
        <textarea name="remarks" placeholder="Add Remarks" rows="4" class="form-control"></textarea>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit2" class="btn btn-primary">Add Item</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal-->
<script>
        $("#dropdown").click(function() {
        var button2 = $(this).val();
        var res = button2.split("/");
        $("#item_ids").val(res[0]);
        $("#value").val(res[1]);
        $("#quantity").val(res[2]);
        $("#description").val(res[3]);        
      });
        </script>