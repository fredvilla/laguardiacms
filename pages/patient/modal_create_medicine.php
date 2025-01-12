<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Medicine</h5>
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
                if (isset($_POST['create_medicine'])) {
                  // echo "<script> $('#exampleModal').modal('show');</script>";
                  echo create_medicine();
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
                    <label for="recipient-name" class="col-form-label">*Medicine Type:</label>
                    <select name="type" id="type" class="form-control" required>
                      <option selected disabled>--SELECT--</option>
                      <option value="Tablet"
                        <?= (isset($_POST['type']) && "Tablet" == $_POST['type']) ? 'selected' : '' ?>>Tablet</option>
                      <option value="Bottle"
                        <?= (isset($_POST['type']) && "Bottle" == $_POST['type']) ? 'selected' : '' ?>>Bottle</option>
                    </select>
                  </div>

                </div>

                <div class="form-row piece">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">Per Piece:</label>
                    <input type="number" name="piece" class="form-control" id="recipient-name"
                      value="<?= isset($_POST['piece']) ? $_POST['piece'] : '' ?>">
                  </div>
                </div>

                <div class="form-row dosage">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">Dosage:</label>
                    <input type="text" name="dosage" class="form-control" id="recipient-name"
                      value="<?= isset($_POST['dosage']) ? $_POST['dosage'] : '' ?>">
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
            <input type="hidden" name="table" value="<?= $table ?>">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="create_medicine" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#type").on("change", function() {
    let val = $(this).val();
    console.log($(".piece"));
    if (val == 'Tablet') {
      $(".dosage, .piece").hide();
      $(".piece").show();
    } else if (val == 'Bottle') {
      $(".dosage, .piece").hide();
      $(".dosage").show();
    } else {
      $(".dosage, .piece").hide();
    }
  });

  $("#type").trigger("change");
});
</script>