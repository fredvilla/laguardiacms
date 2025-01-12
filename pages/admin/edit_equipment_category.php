<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?= isset($_POST['update_category']) ?  update_category() : '' ?>
      <?php

extract($_GET);
$equipment = get_one("select * from tbl_equipment_category where id = $id");
 ?>
      <h6 class="m-0 font-weight-bold text-primary">
        Category Information:
      </h6>
    </div>

    <div class="card-body">

      <div class="row">
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Equipment Category ID:<?= $id ?></h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="table" value="tbl_equipment_category">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row">
                  <div class="col-md-12">


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Name:</label>
                        <input type="text" name="name" class="form-control text-uppercase"
                          value="<?= $equipment->name ?>">
                      </div>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>

      </div>

      <div class="d-flex">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update" style="margin-left:5px">
        <a style="margin-left:5px" href="list_medicine_category.php" type="button" class="btn btn-primary">Back</a>
      </div>
      </form>

      <?php
                include_once('../layout/footer.php');


                ?>