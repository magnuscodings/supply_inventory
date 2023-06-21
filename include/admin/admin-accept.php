<?php
if(isset($_POST['delete'])){
  $id=$_POST['approval_id'];
  $delete="Delete From custodian where id ='$id'";
      mysqli_query($conn,$delete)or die(mysqli_error($conn));
      header("Refresh:0");
}else if(isset($_POST['approve'])){
  $id=$_POST['approval_id'];
  $update="UPDATE custodian SET status = '2' WHERE custodian.id = '$id'";
      mysqli_query($conn,$update)or die(mysqli_error($conn));
      mysqli_query($conn,$update_item)or die(mysqli_error($conn));
      header("Refresh:0");
}
?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Accept">
Action
</button> -->
<a href="<?php echo $temp_id?>" class="btn btn-danger zz" data-bs-toggle="modal" data-bs-target="#Accept">Accept</a>

<!-- Modal -->
<div class="modal fade" id="Accept" tabindex="-1" aria-labelledby="AcceptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="AcceptModalLabel">Approval Request!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST">
      <div class="modal-body">
        
        <input type="hidden"id="approval_id" name="approval_id">
      <h5 class="text-warning">Do you want to approve this request?</h5>

      </div>
      <div class="modal-footer">
        <button type="submit" name="approve" class="btn btn-primary">Approve Request</button>
        <button type="submit" name="delete" class="btn btn-danger">Delete Request</button>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal-->
<script>
            $(".zz").unbind().click(function(event) {
                var href = $(this).attr('href');
                $("#approval_id").val(href);
            });
        </script>