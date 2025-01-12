<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?= isset($_POST['update_service']) ?  update_service() : '' ?>
      <?php

      extract($_GET);
      $service = get_one("select * from tbl_services where id = $id");
      ?>
      <h6 class="m-0 font-weight-bold text-primary">
        Service Information:
      </h6>
    </div>

    <div class="card-body">

      <div class="row">
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Service ID:<?= $id ?></h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row">
                  <div class="col-md-12">



                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Name:</label>
                        <input type="text" name="name" class="form-control text-uppercase"
                          value="<?= $service->name ?>">
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="recipient-name" class="col-form-label">*Category:</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                          <?php foreach (get_all("select * from tbl_service_category") as $res) { ?>
                          <option value="<?= $res['id'] ?>"
                            <?= ($res['id'] = $service->service_category_id) ? "selected" : "" ?>>
                            <?= $res['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Description:</label>
                        <textarea name="description" class="form-control" id="" cols="3"
                          rows="3"><?= $service->description ?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Price:</label>
                        <input type="number" name="price" class="form-control text-uppercase"
                          value="<?= $service->price ?>">
                      </div>
                    </div>


                  </div>

                </div>
            </div>
          </div>
        </div>

      </div>

      <div class="d-flex">
        <input type="submit" name="update_service" class="btn btn-primary" value="Update" style="margin-left:5px">
        <a style="margin-left:5px" href="list_service.php" type="button" class="btn btn-primary">Back</a>
      </div>
      </form>

      <?php
      include_once('../layout/footer.php');


      ?>