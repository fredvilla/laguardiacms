<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Laboratory/Equipment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php
                if (isset($_POST['create_equipment'])) {
                  // echo "<script> $('#exampleModal').modal('show');</script>";
                  echo create_equipment();
                }
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Name:</label>
                    <input type="text" name="name" class="form-control" id="recipient-name" required
                      value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Description:</label>
                    <textarea name="description" id="" cols="30" rows="2"
                      class="form-control"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                  </div>
                </div>


                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Price:</label>
                    <input type="number" name="price" class="form-control" id="recipient-name" required
                      value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Stock:</label>
                    <input type="number" name="stock" class="form-control" id="recipient-name" required
                      value="<?= isset($_POST['stock']) ? $_POST['stock'] : '' ?>">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="table" value="<?= $table ?>">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="create_equipment" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>