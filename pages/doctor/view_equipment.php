<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php
extract($_GET);
$equipment = get_one("select * from tbl_equipment where id = $id");
 ?>
      <h6 class="m-0 font-weight-bold text-primary">
        Equipment Information:
      </h6>
    </div>

    <div class="card-body">

      <div class="row">
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Equipment ID:<?= $id ?></h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-12">

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Name:</label>
                        <input type="text" name="name" class="form-control text-uppercase"
                          value="<?= $equipment->name ?>" disabled>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Description:</label>
                        <textarea name="description" class="form-control" id="" cols="3" rows="3"
                          disabled><?= $equipment->description ?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Price:</label>
                        <input type="number" name="price" class="form-control text-uppercase"
                          value="<?= $equipment->price ?>" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Stock:</label>
                        <input type="number" name="price" class="form-control text-uppercase"
                          value="<?= $equipment->stock ?>" disabled>
                      </div>
                    </div>

                  </div>

                </div>
            </div>
          </div>
        </div>
      </div>


      <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
      <div class="d-flex">
        <a style="margin-left:5px" href="list_equipment.php" type="button" class="btn btn-primary">Back</a>
      </div>
      </form>

      <?php
                include_once('../layout/footer.php');


                ?>