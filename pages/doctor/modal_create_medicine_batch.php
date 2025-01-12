<div class="modal fade" id="medicineModal" tabindex="-1" role="dialog" aria-labelledby="medicineModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="medicineModalLabel">Create Medicine Batch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $_GET['id']?>">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php
                if (isset($_POST['create_medicine_batch'])) {
                  // echo "<script> $('#medicineModal').modal('show');</script>";
                  echo create_medicine_batch();
                }
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Stock:</label>
                    <input type="number" name="stock" class="form-control" id="recipient-name"
                      value="<?= isset($_POST['stock']) ? $_POST['stock'] : '' ?>">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Expiration Date:</label>
                    <input type="date" name="expiration_date" class="form-control" id="recipient-name"
                      value="<?= isset($_POST['expiration_date']) ? $_POST['expiration_date'] : '' ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="create_medicine_batch" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>