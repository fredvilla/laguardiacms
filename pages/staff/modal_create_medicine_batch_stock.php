<div class="modal fade" id="medicineModalStock" tabindex="-1" role="dialog" aria-labelledby="medicineModalStockLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="medicineModalStockLabel">Create Medicine Batch</h5>
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
                if (isset($_POST['add_stock'])) {
                  // echo "<script> $('#medicineModalStock').modal('show');</script>";
                  echo add_stock();
                }
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Expiration Date:</label>
                    <select name="stock_id" id="stock_id" class=" form-control" required style="width:100%">
                      <?php foreach (mysqli_query($conn, "SELECT * from tbl_medicine_stock where medicine_id = $id") as $row) { ?>
                      <option value="<?= $row['id'] ?>"
                        <?= (isset($_POST['stock_id']) && $row['id'] == $_POST['stock_id']) ? 'selected' : '' ?>>
                        <?= strtoupper($row['expiration_date']) ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Stock:</label>
                    <input type="number" name="stock" class="form-control" id="recipient-name"
                      value="<?= isset($_POST['stock']) ? $_POST['stock'] : '' ?>">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add_stock" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>