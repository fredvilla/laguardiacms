<?php
include_once('../layout/header.php');
?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        User Information
      </h6>
    </div>
    <div class="card-body">
      <?php
                if (isset($_GET['id'])) {
                    extract($_GET);
                    $userinfo = mysqli_query($conn, "SELECT * FROM $type WHERE id = '$id'");
                    if (mysqli_num_rows($userinfo) > 0) {
                        foreach ($userinfo as $user) {

                ?>

      <form action="" method="post">
        <div class="row">
          <div class="col-md-12">
            <h6 class="m-0 font-weight-bold text-primary">
              <?= ucfirst($_GET['type']) ?> Information
            </h6>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>*First Name:</label>
                <input type="text" name="fname" value="<?= $user['fname']; ?>" class="form-control" id="recipient-name"
                  disabled>
              </div>
              <div class="form-group col-md-4">
                <label>*Middle Name:</label>
                <input type="text" name="fname" value="<?= $user['mname']; ?>" class="form-control" id="recipient-name"
                  disabled>
              </div>
              <div class="form-group col-md-4">
                <label>*Last Name:</label>
                <input type="text" name="fname" value="<?= $user['lname']; ?>" class="form-control" id="recipient-name"
                  disabled>
              </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-12">
                <label>*Contact Number:</label>
                <div class="d-flex">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">+63</div>
                    </div>
                    <input type="text" name="cn" value="<?= $user['cn']; ?>" class="form-control" id="recipient-name"
                      disabled>
                  </div>
                </div>
              </div>


            </div>


            <div class="form-row">
              <div class="form-group col-md-4">
                <label>*Province:</label>

                <select name="province_id" id="province_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from tbl_province order by name asc") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $user['province_id'] == $row['id'] ? 'selected' : '' ?>>
                    <?= $row['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>*City:</label>
                <select name="city_id" id="city_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from tbl_city where province_id = '" . $user['province_id'] . "' order by name asc") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $user['city_id'] == $row['id'] ? 'selected' : '' ?>
                    zip="<?= $row['zip_code'] ?>">
                    <?= $row['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>*Barangay:</label>
                <select name="barangay_id" id="barangay_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from tbl_barangay where city_id = '" . $user['city_id'] . "' order by name asc") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $user['barangay_id'] == $row['id'] ? 'selected' : '' ?>>
                    <?= $row['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-6">
                <label>*House #:</label>
                <input type="text" name="house_no" class="form-control" id="recipient-name" disabled
                  value="<?= $user['house_no']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label>*Zip Code:</label>
                <input type="number" name="zip_code" readonly class="form-control" id="recipient-name" minlength="4"
                  maxlength="4" disabled value="<?= $user['zip_code']; ?>">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <h6 class="m-0 font-weight-bold text-primary">
              Login Credentials
            </h6>

            <div class="form-row">
              <div class="text-center" style="width: 100%;padding-top: 8.5%;">
                <!-- Profile picture image-->
                <div class="form-group col-md-12">
                  <img class="img-account-profile rounded-circle mb-2" src="../../files/<?= $user['pic'] ?>" alt=""
                    style="height: 83px;width:83px;border-radius: 50% !important;vertical-align:middle" id="preview">
                </div>
              </div>
            </div>

            <div class="form-row">

              <?php if($type != 'patient'){ ?>
              <div class="form-group col-md-12">
                <label>*Type:</label>
                <select name="table" id="table" class="form-control" disabled>
                  <option value="admin" <?= $type == 'admin' ? 'selected' : '' ?>>Admin</option>
                  <option value="doctor" <?= $type == 'doctor' ? 'selected' : '' ?>>Doctor</option>
                  <option value="staff" <?= $type == 'staff' ? 'selected' : '' ?>>Staff</option>
                  <option value="patient" <?= $type == 'patient' ? 'selected' : '' ?>>Patient</option>
                </select>
              </div>
              <?php }else{ ?>
              <input type="hidden" name="table" value="patient">
              <?php } ?>
              <div class="form-group col-md-12">
                <label>*Email:</label>
                <input type="email" name="eml" value="<?= $user['email']; ?>" class=" form-control"
                  id="recipient-name checking_email" disabled>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="recipient-name" class="col-form-label">*Password:</label>
                <div class="d-flex">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <button type="button" class="form-control btn btn-primary" id="btn_generate_password" disabled>
                        Generate Password</button>
                    </div>
                    <input type="password" name="pass" class="form-control" id="password" required
                      value="<?= $user['password']; ?>" disabled>
                  </div>
                </div>
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label class="col-form-label">*Show Password <input type="checkbox" onclick="myFunction()"> </label>
              </div>
            </div>
          </div>
        </div>
        <?php if($_GET['type'] == 'patient'){ ?>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-services-tab" data-toggle="pill" href="#pills-services" role="tab"
              aria-controls="pills-services" aria-selected="true">Medical History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-medicine-tab" data-toggle="pill" href="#pills-medicine" role="tab"
              aria-controls="pills-medicine" aria-selected="false">Payment Historry</a>
          </li>
        </ul>


        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-services" role="tabpanel"
            aria-labelledby="pills-services-tab">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Medical History</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-bordered" width="100%" cellspacing="0" id="tbl_service">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Medical Service</th>
                        <th>Laboratory/Equipment Test</th>
                        <th>Doctor</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php foreach (get_all("SELECT a.id,date_format(a.appointment_date, '%M %d, %Y') as appointment_date,UPPER(concat(ifnull(d.fname,''), ' ', ifnull(d.mname,''), ' ', ifnull(d.lname,''))) as doctor,
group_concat(distinct 
concat(s.name, ', QTY:',sa.qty, ',result:', ifnull(sa.result,'TBA'),'<br> ')
)
as service,
group_concat(distinct 
concat(e.name, ', QTY:',ea.qty, ',result:', ifnull(ea.result,'TBA'),'<br> ')
)
as laboratory

FROM tbl_appointment a left join doctor d on d.id = a.doctor_id 
left join tbl_appointment_services sa on sa.appointment_id = a.id left join tbl_services s on s.id = sa.service_id
left join tbl_appointment_equipment ea on ea.appointment_id = a.id left join tbl_equipment e on e.id = ea.equipment_id
where a.patient_id = ".$_GET['id']." and a.status = 'completed' group by a.id
") as $res) { ?>

                      <tr>
                        <td><?= $res['appointment_date'] ?></td>
                        <td><?= html_entity_decode($res['service'] ?? '<p></p>') ?></td>
                        <td><?= $res['laboratory'] ?></td>
                        <td><?= $res['doctor'] ?></td>
                        <td><a href="view_appointment.php?id=<?= $res['id'] ?>" class="btn btn-primary">View</a>
                        </td>
                      </tr>
                      <?php }  ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-medicine" role="tabpanel" aria-labelledby="pills-medicine-tab">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Payment Bill History</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-bordered" width="100%" cellspacing="0" id="tbl_service">
                    <thead>
                      <tr>
                        <th>Appointment Date</th>
                        <th>Checkup Status</th>
                        <th>Paid Date</th>
                        <th>Paid Status</th>
                        <th>Amount</th>
                        <th>Change</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php foreach (get_all("SELECT a.*,p.*,ifnull(p.appointment_id, 0) as paid_status,a.id FROM tbl_appointment a left join tbl_appointment_payment p on p.appointment_id = a.id where p.patient_id = ".$_GET['id']." order by p.paid_date ") as $res) { ?>

                      <tr>
                        <td><?= format_date($res['appointment_date']) ?></td>
                        <td><?= strtoupper($res['status']) ?></td>
                        <td><?= format_date($res['paid_date'] ?? null) ?></td>
                        <td><?= ($res['paid_status']) ? 'PAID' : 'UNPAID' ?></td>
                        <td class="text-right"><?= number_format($res['amount']) ?></td>
                        <td class="text-right"><?= number_format($res['change']) ?></td>
                        <td><a href="view_appointment.php?id=<?= $res['id'] ?>" class="btn btn-primary"><i
                              class="fa fa-eye"></i></a>
                        </td>
                      </tr>
                      <?php }  ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


    </div>
  </div>



  <?php } ?>
  <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
  <a style="display:inline-block;" href="<?= $_SESSION['back_url'] ?>" type="button" class="btn btn-primary">Back</a>

  </form>
  <?php
                        }
                    } else {
                        ?>
  <h4>No Records Found</h4>
  <?php
                    }
                }
                ?>

  <?php
                include_once('../layout/footer.php');
                ?>