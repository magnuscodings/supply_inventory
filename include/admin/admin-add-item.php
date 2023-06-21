<?php
if(isset($_POST['description'])){
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $value = str_replace(',', '', $_POST['value']);
  try{
    $insert = mysqli_query($conn,"INSERT INTO items (userID, description, quantity, value) VALUES ('$id', '$description', '$quantity', '$value')");
  if($insert){
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
    alert('Failed Adding Duplicate Entries!');
    window.location.href='';
    </script>";
  }
}
?>
<!-- Button trigger modal -->
        <button type="button" class="btn btn-success mt-2 ms-2" data-bs-toggle="modal" data-bs-target="#AddModal">
Add Supplies and Equipments
</button>
<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add Supplies and Equipments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        <input type="text" name="description" class="form-control mb-2" placeholder="Add Description" title="Add Description" required>
        <input type="number" min="1" name="quantity" class="form-control mb-2" placeholder="Add Quantity" title="Add Quantity" required>
        <input type="number" name="value" class="form-control mb-2" placeholder="Add Value" title="Add Value" required>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Item</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal-->