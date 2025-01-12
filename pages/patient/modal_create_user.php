<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
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
                if (isset($_POST['create_user'])) {
                  // echo "<script> $('#exampleModal').modal('show');</script>";
                  echo create_user();
                }
                ?>
              </div>
            </div>
            <div class="row">
              <!-- <div class="col-md-12">
                <h6 class="m-0 font-weight-bold text-primary">
                  <?= ucfirst($table) ?> Information
                </h6>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">First Name:</label>
                    <input type="text" name="fname" class="form-control"
                      value="<?= isset($_POST['fname']) ? $_POST['fname'] : '' ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">Middle Name:</label>
                    <input type="text" name="mname" class="form-control"
                      value="<?= isset($_POST['mname']) ? $_POST['mname'] : '' ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">Last Name:</label>
                    <input type="text" name="lname" class="form-control"
                      value="<?= isset($_POST['lname']) ? $_POST['lname'] : '' ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">Contact Number:</label>
                    <div class="d-flex">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">+63</div>
                        </div>
                        <input
                          oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          type="number" maxlength="10" name="cn" class="form-control" required
                          value="<?= isset($_POST['cn']) ? $_POST['cn'] : '' ?>">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">*Province:</label>
                    <select name="province_id" id="province_id" class="form-control" required>
                      <?php foreach (mysqli_query($conn, "SELECT * from tbl_province order by name asc") as $row) { ?>
                      <option value="<?= $row['id'] ?>"
                        <?= (isset($_POST['province_id']) && $row['id'] == $_POST['province_id']) ? 'selected' : '' ?>>
                        <?= $row['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">*City:</label>
                    <select name="city_id" id="city_id" class="form-control" required>
                      <?php foreach (mysqli_query($conn, "SELECT * from tbl_city where province_id = '1401' order by name asc") as $row) { ?>
                      <option value="<?= $row['id'] ?>" zip="<?= $row['zip_code'] ?>"
                        <?= (isset($_POST['city_id']) && $row['id'] == $_POST['city_id']) ? 'selected' : '' ?>>
                        <?= $row['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">*Barangay:</label>
                    <select name="barangay_id" id="barangay_id" class="form-control" required>
                      <?php foreach (mysqli_query($conn, "SELECT * from tbl_barangay where city_id = '0' order by name asc") as $row) { ?>
                      <option value="<?= $row['id'] ?>"
                        <?= (isset($_POST['barangay_id']) && $row['id'] == $_POST['barangay_id']) ? 'selected' : '' ?>>
                        <?= $row['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label">*House #:</label>
                    <input type="text" name="house_no" class="form-control" required
                      value="<?= isset($_POST['house_no']) ? $_POST['house_no'] : '' ?>">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label">*Zip Code:</label>
                    <input type="number" name="zip_code" class="form-control" required minlength="4" maxlength="4"
                      readonly value="<?= isset($_POST['zip_code']) ? $_POST['zip_code'] : '2815' ?>">
                  </div>
                </div>
              </div> -->
              <div class="col-md-12">
                <h6 class="m-0 font-weight-bold text-primary">
                  Login Credentials
                </h6>
                <div class="form-row">
                  <div class="text-center" style="width: 100%;padding-top: 5%;">
                    <!-- Profile picture image-->
                    <div class="form-group col-md-12">
                      <img class="img-account-profile rounded-circle mb-2" src="../../files/default.png" alt=""
                        style="height: 83px;width:83px;border-radius: 50% !important;vertical-align:middle"
                        id="preview">
                    </div>
                  </div>
                </div>


                <div class="form-row" style="margin-bottom: 10px;">
                  <div class="form-group col-md-12">
                    <input type="file" name="image" class="" id="image" accept="image/*">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Type:</label>
                    <select name="table" id="table" class="form-control" required>
                      <option value="admin"
                        <?= (isset($_POST['table']) && "admin" == $_POST['table']) ? 'selected' : '' ?>>Admin</option>
                      <option value="doctor"
                        <?= (isset($_POST['table']) && "doctor" == $_POST['table']) ? 'selected' : '' ?>>Doctor
                      </option>
                      <option value="staff"
                        <?= (isset($_POST['table']) && "staff" == $_POST['table']) ? 'selected' : '' ?>>Staff</option>
                      <option value="patient"
                        <?= (isset($_POST['table']) && "patient" == $_POST['table']) ? 'selected' : '' ?>>Patient
                      </option>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Email:</label>
                    <input type="email" name="eml" class="form-control" required
                      value="<?= isset($_POST['eml']) ? $_POST['eml'] : '' ?>">
                  </div>

                </div>



                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="col-form-label">*Password:</label>
                    <div class="d-flex">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <button type="button" class="form-control btn btn-primary" id="btn_generate_password">
                            Generate Password</button>
                        </div>
                        <input type="password" name="pass" class="form-control" id="password" required
                          value="<?= generate_password() ?>">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="create_user" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>