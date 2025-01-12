<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php
extract($_GET);
$medicine_batch = get_one("select * from tbl_medicine_stock where id = $id");
$medicine = get_one("select * from tbl_medicine where id = $medicine_batch->medicine_id");
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
                        <label>*Expiration Date:</label>
                        <input type="text" name="name" class="form-control text-uppercase"
                          value="<?= $medicine_batch->expiration_date ?>" disabled>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Type:</label>
                        <select name="type" id="type" class="form-control selectn" disabled>
                          <option value="Tablet" <?= $medicine->type == 'Tablet' ? 'selected' : '' ?>>Tablet</option>
                          <option value="Bottle" <?= $medicine->type == 'Bottle' ? 'selected' : '' ?>>Bottle</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Name:</label>
                        <input type="text" name="name" class="form-control text-uppercase"
                          value="<?= $medicine->name ?>" disabled>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Description:</label>
                        <textarea name="description" class="form-control" id="" cols="3" rows="3"
                          disabled><?= $medicine->description ?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>*Price:</label>
                        <input type="number" name="price" class="form-control text-uppercase"
                          value="<?= $medicine->price ?>" disabled>
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
              <h6 class="m-0 font-weight-bold text-primary">Stock History</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_equipment">
                  <thead>
                    <tr>
                      <th>Amount</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Stock In</th>
                      <th>Stock Out</th>
                      <th>Date</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $tmp_stock = 0 ?>
                    <?php foreach (get_all("select ms.*,date_format(ms.created_date, '%M %d, %Y') as created_date from tbl_medicine_stock_history ms where ms.stock_id = $id order by id asc") as $row) { ?>
                    <tr>
                      <td><?= sign($row['qty']) ?></td>
                      <td><?= sign($tmp_stock) ?></td>
                      <td><?= sign($tmp_stock += $row['qty']) ?></td>
                      <td><?= ($row['qty'] > 0) ? sign($row['qty']) : 0 ?></td>
                      <td><?= ($row['qty'] > 0) ? 0 : sign($row['qty']) ?></td>
                      <td><?= $row['created_date'] ?></td>
                      <!-- <td style="text-align: right;"><?= $row['stock'] ?></td> -->
                      <!-- <td style="text-align: right;"><?= number_format($medicine->price *( $row['stock']??0),2) ?></td> -->

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
        <a style="margin-left:5px" href="edit_medicine.php?id=<?= $medicine->id ?>" type="button"
          class="btn btn-primary">Back</a>
      </div>
      </form>

      <?php
                include_once('../layout/footer.php');


                ?>