<?php
if(isset($_POST['delete'])){
  $id=$_POST['item_id'];
  $delete="Delete From custodian where id ='$id'";
      mysqli_query($conn,$delete)or die(mysqli_error($conn));
      header("location:admin-custodian.php");
}else if(isset($_POST['approved2'])){
  $id=$_POST['item_id'];
  $location=$_POST['location'];
  $quantity=$_POST['quantity'];
  $remarks=$_POST['remarks'];
  $qtyleft =$_POST['qtyleft'];
  $newQty=$qtyleft-$quantity;
  $update="UPDATE custodian SET location = '$location', quantity = '$quantity', remarks = '$remarks' WHERE id = '$id'";
      mysqli_query($conn,$update)or die(mysqli_error($conn));
  if($quantity=="0"){
    $update2="UPDATE custodian SET status = '0' WHERE id = '$id'";
    mysqli_query($conn,$update2)or die(mysqli_error($conn));
  }else{
    $update2="UPDATE custodian SET status = '$newQty' WHERE id = '$id'";
    mysqli_query($conn,$update2)or die(mysqli_error($conn));
  }
      header("location:admin-custodian.php");
}
?>
<button value="<?php echo $temp_id?>/<?php echo $row['location']?>/<?php echo $row['quantity']?>/<?php echo $row['remarks']?>/<?php echo $row['qtyLeft']?>" class="btn btn-primary zz" data-bs-toggle="modal" data-bs-target="#Accept">Edit</button>
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
        <input type="hidden" id="qtyleft" name="qtyleft">
        <input type="text" id="desc" name="location" class="form-control mb-2" placeholder="Edit Location" title="Edit Location" required>
        <input type="number" id="qty" min="0" max="" name="quantity" class="form-control mb-2" placeholder="Edit Quantity" title="Edit Quantity" required>
        <textarea name="remarks" id="val" placeholder="Add Remarks" rows="4" class="form-control"></textarea>

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
                $("#qtyleft").val(res[4]);
                $("#qty").attr({
                  "max" : res[4]
                });

            });
        </script>