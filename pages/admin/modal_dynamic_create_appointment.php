    <?php 

include_once('../../config/functions.php');
extract($_POST);
$no_of_doctors = get_one("select count(ifnull(id, 0)) as result from doctor")->result ?? 0;
$maximum_slot_per_doctor = 12 / $no_of_doctors;
get_one("select count(ifnull(id, 0)) as result from tbl_appointment where appointment_date = '$appointment_date'")->result ?? 0;

?>

    <form method="post" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
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
                  <?php foreach (mysqli_query($conn, "SELECT d.* from doctor d where d.id not in(SELECT doctor_id FROM tbl_appointment where appointment_date = '$appointment_date' group by appointment_date,doctor_id having count(doctor_id) > $maximum_slot_per_doctor)") as $row) { ?>
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
                <input type="date" name="appointment_date" class="form-control" required
                  value="<?= isset($_POST['appointment_date']) ? $_POST['appointment_date'] : date('Y-m-d') ?>"
                  disabled>
                <input type="hidden" name="appointment_date" class="form-control" required
                  value="<?= isset($_POST['appointment_date']) ? $_POST['appointment_date'] : date('Y-m-d') ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="recipient-name" class="col-form-label">*Appointment Time:</label>
                <select name="time_id" id="time_id" class="select2 form-control" required style="width:100%">
                  <?php foreach (mysqli_query($conn, "SELECT id,start as raw_start,TIME_FORMAT(start, '%r') as start, TIME_FORMAT(end, '%r') as end FROM tbl_time where id not in (select time_id from tbl_appointment where appointment_date = '$appointment_date');") as $row) { ?>
                  <option value="<?= $row['id'] ?>"
                    <?= (isset($_POST['start_time']) && $row['raw_start'] == $_POST['start_time']) ? 'selected' : '' ?>>
                    <?= strtoupper($row['start'].' - '.$row['end']) ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" name="create_appointmentv2" class="btn btn-primary" value="1">Submit</button>
      </div>
    </form>