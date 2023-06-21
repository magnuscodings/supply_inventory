<?php
if(isset($_POST['delete'])){
  $id=$_POST['item_id'];
  $delete="Delete From items where id ='$id'";
      mysqli_query($conn,$delete)or die(mysqli_error($conn));
      header("location:admin-inventory.php");
}else if(isset($_POST['approved2'])){
  $id=$_POST['item_id'];
  $description=$_POST['description'];
  $quantity=$_POST['quantity'];
  $val=$_POST['value'];

  $update="UPDATE items SET description = '$description', quantity = '$quantity', value = '$val' WHERE id = '$id'";
      mysqli_query($conn,$update)or die(mysqli_error($conn));
      header("location:admin-inventory.php");
}
?>
<button value="<?php echo $temp_id?>/<?php echo $row['description']?>/<?php echo $row['quantity']?>/<?php echo $row['value']?>" class="btn btn-primary zz" data-bs-toggle="modal" data-bs-target="#Accept">Edit</button>
<!-- Modal -->
<div class="modal fade" id="Accept" tabindex="-1" aria-labelledby="AcceptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="AcceptModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        
        <input type="hidden"id="item_id" name="item_id">
        <?php
        // echo"$temp_id";

        ?>
        <input type="text" id="desc" name="description" class="form-control mb-2" placeholder="Edit Description" title="Edit Description" required>
        <input type="number" id="qty" min="1" name="quantity" class="form-control mb-2" placeholder="Edit Quantity" title="Edit Quantity" required>
        <input type="number" id="val" name="value" class="form-control mb-2" placeholder="Edit Value" title="Edit Value" required>

      </div>
      <div class="modal-footer">
        <button type="submit" name="approved2" class="btn btn-primary">Save</button>
        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal-->
<script>
            $(".zz").unbind().click(function(event) {
                var val = $(this).attr('value');
                var res = val.split("/");
                $("#item_id").val(res[0]);
                $("#desc").val(res[1]);
                $("#qty").val(res[2]);
                $("#val").val(res[3]); 

            });
        </script>