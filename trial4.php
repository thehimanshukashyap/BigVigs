<?php include_once 'header.php';?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">ADD NEW ADDRESS</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <span style="font-size:0.9rem;font-weight:600; border:none!important" class="form-control">CONTACT DETAILS</span>
            <div class="col-12">
                <label for="name" style="font-size:small">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="">
            </div>
            <div class="col-12">
                <label for="name" style="font-size:small">Mobile No.</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="">
            </div>
            <span style="font-size:0.9rem;font-weight:600; border:none!important" class="form-control">ADDRESS</span>
            <div class="col-12">
                <label for="name" style="font-size:small">Pincode</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="">
            </div>
            <div class="col-12">
                <label for="name" style="font-size:small">Address</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="">
            </div>
            <div class="col-12">
                <label for="name" style="font-size:small">City</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-lg btn-block shadow-none" style="font-weight: 500; font-size:0.9rem; color: white; background-color: tomato;">ADD ADDRESS</button>
      </div>
    </div>
  </div>
</div>
<?php include_once 'footer.php';?>