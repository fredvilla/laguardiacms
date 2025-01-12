<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?= isset($_POST['update_medicine']) ?  update_medicine() : '' ?>
      <?= isset($_POST['delete_medicine_batch']) ?  delete_medicine_batch() : '' ?>
      <?php

extract($_GET);
$medicine = get_one("select * from tbl_medicine where id = $id");
include_once('modal_create_medicine_batch.php');
include_once('modal_create_medicine_batch_stock.php');
 ?>
      <h6 class="m-0 font-weight-bold text-primary">
        Medicine Information:
      </h6>
    </div>

    <div class="card-body">

      <div class="row">
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Medicine ID:<?= $id ?></h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row">
                  <div class="col-md-12">


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Type:</label>
                        <select name="type" id="type" class="form-control selectn">
                          <option value="Tablet" <?= $medicine->type == 'tablet' ? 'selected' : '' ?>>Tablet</option>
                          <option value="Bottle" <?= $medicine->type == 'bottle' ? 'selected' : '' ?>>Bottle</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-row piece">
                      <div class="form-group col-md-12">
                        <label>*Per Piece:</label>
                        <input type="text" name="piece" class="form-control text-uppercase"
                          value="<?= $medicine->piece ?>">
                      </div>
                    </div>
                    <div class="form-row dosage">
                      <div class="form-group col-md-12">
                        <label>*Dosage:</label>
                        <input type="text" name="dosage" class="form-control text-uppercase"
                          value="<?= $medicine->dosage ?>">
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Name:</label>
                        <input type="text" name="name" class="form-control text-uppercase"
                          value="<?= $medicine->name ?>">
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Description:</label>
                        <textarea name="description" class="form-control" id="" cols="3"
                          rows="3"><?= $medicine->description ?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Price:</label>
                        <input type="number" name="price" class="form-control text-uppercase"
                          value="<?= $medicine->price ?>">
                      </div>
                    </div>

                  </div>

                </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Medicine Batch Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_equipment">
                  <thead>
                    <tr>
                      <!-- <th>ID</th> -->
                      <th>Name</th>
                      <th>Expiration Date</th>
                      <th>Stock</th>
                      <!-- <th>Total</th> -->
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach (get_all("select ms.*,date_format(ms.expiration_date, '%M %d, %Y') as expiration_date from tbl_medicine_stock ms where ms.medicine_id = $id") as $row) { ?>
                    <tr>
                      <!-- <td><?= $row['id'] ?></td> -->
                      <td><?= $medicine->name ?></td>
                      <td><?= $row['expiration_date'] ?></td>
                      <td style="text-align: right;"><?= $row['stock'] ?></td>
                      <!-- <td style="text-align: right;"><?= number_format($medicine->price *( $row['stock']??0),2) ?></td> -->
                      <td style="d-flex">
                        <a href="view_medicine_batch.php?id=<?= $row['id'] ?>" target="_blank"
                          class="btn btn-primary">View</a>
                        <button type="submit" name="delete_medicine_batch" value="<?= $row['id'] ?>"
                          class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
      <div class="d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicineModal"> Add
          Batch</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicineModalStock"
          style="margin-left:5px"> Add Stock</button>
        <input type="submit" name="update_medicine" class="btn btn-primary" value="Update" style="margin-left:5px">
        <a style="margin-left:5px" href="list_medicine.php" type="button" class="btn btn-primary">Back</a>
      </div>
      </form>

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

      <?php
                include_once('../layout/footer.php');


                ?>