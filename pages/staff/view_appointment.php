<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <form action="" method="post">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <?= isset($_POST['change_status']) ?  change_status() : '' ?>
        <?= isset($_POST['update_appointment']) ?  update_appointment() : '' ?>
        <?= isset($_POST['pay_appointment']) ?  pay_appointment() : '' ?>
        <?php

        extract($_GET);
        $appointment = get_one("select * from tbl_appointment where id = $id");

        ?>
        <h6 class="m-0 font-weight-bold text-primary">
          Appointment ID: <?= $id ?>
          <input type="hidden" name="id" value="<?= $id ?>">

          <div class="d-flex float-right" style="width:fit-content">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <button type="submit" class="form-control btn btn-primary"
                  <?= in_array($appointment->status, ['rejected', 'closed', 'completed']) ? 'disabled' : '' ?>
                  name="change_status" disabled> Change Status</button>
              </div>
              <select name="status" id="status" class="form-control float-right" style="width:fit-content" disabled>
                <option value="pending" <?= $appointment->status == 'pending' ? 'selected' : '' ?>>PENDING</option>
                <option value="cancelled" <?= $appointment->status == 'cancelled' ? 'selected' : '' ?>>CANCELLED
                </option>
                <option value="reschedule" <?= $appointment->status == 'reschedule' ? 'selected' : '' ?>>RESCHEDULE
                </option>
                <option value="rejected" <?= $appointment->status == 'rejected' ? 'selected' : '' ?>>REJECTED</option>
                <option value="approved" <?= $appointment->status == 'approved' ? 'selected' : '' ?>>APPROVED</option>
                <option value="completed" <?= $appointment->status == 'completed' ? 'selected' : '' ?>>COMPLETED
                </option>
              </select>
            </div>
          </div>
        </h6>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-12">

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>*Patient:</label>
                <select name="patient_id" id="patient_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from patient") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $appointment->patient_id == $row['id'] ? 'selected' : '' ?>>
                    <?= strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>*Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from doctor") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $appointment->doctor_id == $row['id'] ? 'selected' : '' ?>>
                    <?= strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4" disabled>
                <label>*Appointment Date:</label>
                <input type="date" name="appointment_date" value="<?= $appointment->appointment_date ?>"
                  class="form-control" id="recipient-name">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>*Remarks:</label>
                <textarea name="remarks" class="form-control" id="" cols="3" rows="3"
                  disabled><?= $appointment->remarks ?></textarea>
              </div>
            </div>

          </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-services-tab" data-toggle="pill" href="#pills-services" role="tab"
              aria-controls="pills-services" aria-selected="true">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-medicine-tab" data-toggle="pill" href="#pills-medicine" role="tab"
              aria-controls="pills-medicine" aria-selected="false">Medicine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-lab-tab" data-toggle="pill" href="#pills-lab" role="tab"
              aria-controls="pills-lab" aria-selected="false">Lab/Equipment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab"
              aria-controls="pills-history" aria-selected="false">Status History</a>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-services" role="tabpanel"
            aria-labelledby="pills-services-tab">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Services</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_service">
                    <thead>
                      <tr>
                        <th>Result</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>

                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_services s inner join tbl_services ss on ss.id = s.service_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td><input disabled type="text" name="sresult[]" value="<?= strtoupper($row['result'] ?? '') ?>"
                            class="form-control text-uppercase"></td>
                        <td><?= dynamic_dropdown('tbl_services', 'sservice[]', $row['service_id'], true) ?></td>
                        <td><input disabled type='number' disabled value="1" class="form-control"><input type="hidden"
                            data-calc name="sqty[]" value="<?= $row['qty'] ?? 0 ?>" class="form-control"></td>
                        <td style="text-align: right;"><?= number_format($row['price'] * ($row['qty'] ?? 0), 2) ?></td>

                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-medicine" role="tabpanel" aria-labelledby="pills-medicine-tab">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Medicine</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_medicine">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select s.*,m.price,m.name from tbl_appointment_medicine s inner join tbl_medicine_stock ms on ms.id = s.medicine_stock_id inner join tbl_medicine m on m.id = ms.medicine_id where s.appointment_id = $id order by m.id asc") as $row) { ?>
                      <tr>
                        <td><?= medicine_dropdown('mmedicine[]', $row['id'], true) ?></td>
                        <td><input disabled type="number" data-calc name="mqty[]" value="<?= $row['qty'] ?? 0 ?>"
                            class="form-control"></td>
                        <td style="text-align: right;"><?= number_format($row['price'] * ($row['qty'] ?? 0), 2) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-lab" role="tabpanel" aria-labelledby="pills-lab-tab">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lab/Equipment</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_equipment">
                    <thead>
                      <tr>
                        <th>Result</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_equipment s inner join tbl_equipment ss on ss.id = s.equipment_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td><input disabled type="text" name="eresult[]" value="<?= strtoupper($row['result'] ?? '') ?>"
                            class="form-control text-uppercase"></td>
                        <td><?= dynamic_dropdown('tbl_equipment', 'eequipment[]', $row['equipment_id'], true) ?></td>
                        <td><input disabled type="number" data-calc name="eqty[]" value="<?= $row['qty'] ?? 0 ?>"
                            class="form-control"></td>
                        <td style="text-align: right;"><?= number_format($row['price'] * ($row['qty'] ?? 0), 2) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status History</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Date</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select x.*,date_format(x.created_date, '%M %d, %Y') as created_date  from tbl_appointment_status_history x where x.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td><?= strtoupper($row['status']) ?></td>
                        <td><?= strtoupper($row['remarks']) ?></td>
                        <td><?= strtoupper($row['created_date']) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">

          </div>
        </div>
        <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
        <div class="d-flex">

          <a type="button" class="btn btn-primary" style="margin-left:5px" target="_blank"
            href="../../generate.php?type=medical_cert&id=<?= $id ?>"> Medical Certificate</a>
          <a type="button" class="btn btn-primary" style="margin-left:5px" target="_blank"
            href="../../generate.php?type=diagnostic&id=<?= $id ?>"> Medicine Diagnostic</a>
          <button type="button" class="btn btn-primary" style="margin-left:5px" data-toggle="modal"
            data-target="#createBillModal"> Pay</button>
          <a style="margin-left:5px" href="list_appointment.php" type="button" class="btn btn-primary">Back</a>
        </div>
      </div>
  </form>
  <?php 

 include_once('modal_create_bill.php'); 
  ?>
  <?php
  $service_options = '';
  $service_array = [];
  foreach (get_all("select * from tbl_services ") as $res) {
    $service_options .= '<option value=' . $res['id'] . '>' . $res['name'] . '</option>';
    $service_array[$res['id']] = $res['price'];
  }
  $equipment_options = '';
  $equipment_array = [];
  foreach (get_all("select * from tbl_equipment ") as $res) {
    $equipment_options .= '<option value=' . $res['id'] . '>' . $res['name'] . '</option>';
    $equipment_array[$res['id']] = $res['price'];
  }
  $medicine_options = '';
  $medicine_array = [];
  foreach (get_all("select m.*,ms.expiration_date,ms.id from tbl_medicine m inner join tbl_medicine_stock ms on ms.medicine_id = m.id order by m.id asc") as $res) {
    $medicine_options .= '<option value=' . $res['id'] . '>' . $res['name'] . ' Exp.' . $res['expiration_date'] . '</option>';
    $medicine_array[$res['id']] = $res['price'];
  }
  ?>

  <?php
  include_once('../layout/footer.php');

  ?>