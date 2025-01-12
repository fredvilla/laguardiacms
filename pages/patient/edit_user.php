<?php
include_once('../layout/header.php');
?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        User Information
      </h6>
      <hr>
      <div class="card-body">
        <?= isset($_POST['update_user']) ? update_user() : '' ?>
        <?php
                extract($_GET);
                $sql = "select * from $type where id = $id";
                if(get_count($sql) > 0){
                    $user = get_one($sql);
                
                ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <h6 class="m-0 font-weight-bold text-primary">
                <?= ucfirst($type) ?> Information
              </h6>
              <input type="hidden" name="id" value="<?= $user->id ?>">
              <input type="hidden" name="table" value="<?= $type ?>">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>First Name:</label>
                  <input type="text" name="fname"
                    value="<?= isset($_POST['fname']) ? $_POST['fname'] : $user->fname; ?>" class="form-control"
                    id="recipient-name">
                </div>
                <div class="form-group col-md-4">
                  <label>Middle Name:</label>
                  <input type="text" name="mname"
                    value="<?= isset($_POST['mname']) ? $_POST['mname'] : $user->mname; ?>" class="form-control"
                    id="recipient-name">
                </div>
                <div class="form-group col-md-4">
                  <label>Last Name:</label>
                  <input type="text" name="lname"
                    value="<?= isset($_POST['lname']) ? $_POST['lname'] : $user->lname; ?>" class="form-control"
                    id="recipient-name">
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
                      <input type="text" name="cn" value="<?= isset($_POST['cn']) ? $_POST['cn'] : $user->cn; ?>"
                        class="form-control" id="recipient-name">
                    </div>
                  </div>
                </div>


              </div>


              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>*Province:</label>

                  <select name="province_id" id="province_id" class="form-control">
                    <?php foreach (mysqli_query($conn, "SELECT * from tbl_province order by name asc") as $row) { ?>
                    <option value="<?= $row['id'] ?>" <?= $user->province_id == $row['id'] ? 'selected' : '' ?>>
                      <?= $row['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>*City:</label>
                  <select name="city_id" id="city_id" class="form-control">
                    <?php foreach (mysqli_query($conn, "SELECT * from tbl_city where province_id = '" . $user->province_id . "' order by name asc") as $row) { ?>
                    <option value="<?= $row['id'] ?>" <?= $user->city_id == $row['id'] ? 'selected' : '' ?>
                      zip="<?= $row['zip_code'] ?>">
                      <?= $row['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>*Barangay:</label>
                  <select name="barangay_id" id="barangay_id" class="form-control">
                    <?php foreach (mysqli_query($conn, "SELECT * from tbl_barangay where city_id = '" . $user->city_id . "' order by name asc") as $row) { ?>
                    <option value="<?= $row['id'] ?>" <?= $user->barangay_id == $row['id'] ? 'selected' : '' ?>>
                      <?= $row['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>*House #:</label>
                  <input type="text" name="house_no" class="form-control" id="recipient-name"
                    value="<?= isset($_POST['house_no']) ? $_POST['house_no'] : $user->house_no; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>*Zip Code:</label>
                  <input type="number" readonly name="zip_code" class="form-control" id="recipient-name" minlength="4"
                    maxlength="4" value="<?= isset($_POST['zip_code']) ? $_POST['zip_code'] : $user->zip_code; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <h6 class="m-0 font-weight-bold text-primary">
                Login Credentials
              </h6>

              <div class="form-row">
                <div class="text-center" style="width: 100%;padding-top: 1.2%;">
                  <!-- Profile picture image-->
                  <div class="form-group col-md-12">
                    <img class="img-account-profile rounded-circle mb-2" src="../../files/<?= $user->pic ?>" alt=""
                      style="height: 83px;width:83px;border-radius: 50% !important;vertical-align:middle" id="preview">
                  </div>
                </div>
              </div>


              <div class="form-row" style="margin-bottom: 10px;">
                <div class="form-group col-md-12">
                  <input type="file" name="image" class="" id="image" accept="image/*">
                </div>
              </div>
              <div class="form-row">
                <?php if($type != 'patient'){ ?>
                <div class="form-group col-md-12">
                  <label>*Type:</label>
                  <select name="table" id="table" class="form-control">
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
                  <input type="email" name="eml" value="<?= isset($_POST['eml']) ? $_POST['eml'] : $user->email; ?>"
                    class=" form-control" id="recipient-name checking_email">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="recipient-name" class="col-form-label">*Password:</label>
                  <div class="d-flex">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <button type="button" class="form-control btn btn-primary" id="btn_generate_password"> Generate
                          Password</button>
                      </div>
                      <input type="password" name="pass" class="form-control" id="password" required
                        value="<?= isset($_POST['pass']) ? $_POST['pass'] : $user->password; ?>">
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

          <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
          <div class="d-flex">
            <input type="submit" name="update_user" class="btn btn-primary" value="Update">
            <a style="margin-left:5px" href="<?= $_SESSION['back_url'] ?>" type="button"
              class="btn btn-primary">Back</a>
          </div>
        </form>
        <?php } else {  ?>
        <h4>No Records Found</h4>
        <a style="display:inline-block;" href="<?= $_SESSION['back_url'] ?>" type="button"
          class="btn btn-primary">Back</a>
        <?php }   ?>
        <?php
                include_once('../layout/footer.php');
                ?>