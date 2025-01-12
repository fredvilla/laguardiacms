<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="dynamic_content">
        <form method="post" enctype="multipart/form-data">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php
                if (isset($_POST['create_appointment'])) {
                  // echo "<script > $('#exampleModal').modal('show'); </script>";
                  echo create_appointment();
                }
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Patient:</label>
                    <select name="patient_id" id="patient_id" class="select2 form-control" required style="width:100%">
                      <?php foreach (mysqli_query($conn, "SELECT * from patient") as $row) { ?>
                      <option value="<?= $row['id'] ?>"
                        <?= (isset($_POST['patient_id']) && $row['id'] == $_POST['patient_id']) ? 'selected' : '' ?>>
                        <?= strtoupper($row['fname'].' '.$row['mname'].' '.$row['lname']) ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Doctor:</label>
                    <select name="doctor_id" id="doctor_id" class="select2 form-control" required style="width:100%">
                      <?php foreach (mysqli_query($conn, "SELECT * from doctor") as $row) { ?>
                      <option value="<?= $row['id'] ?>"
                        <?= (isset($_POST['doctor_id']) && $row['id'] == $_POST['doctor_id']) ? 'selected' : '' ?>>
                        <?= strtoupper($row['fname'].' '.$row['mname'].' '.$row['lname']) ?></option>
                      <?php } ?>
                    </select>
                  </div>

                </div>


                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Appointment Date:</label>
                    <input type="date" name="appointment_date" class="form-control" id="recipient-name" required
                      value="<?= isset($_POST['appointment_date']) ? $_POST['appointment_date'] : date('Y-m-d') ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="table" value="<?= $table??'' ?>">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="create_appointment" class="btn btn-primary" value="1">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>