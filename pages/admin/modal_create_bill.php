<?php $paid_data = get_one("select * from tbl_appointment_payment where appointment_id = ".$_GET['id']); ?>
<form method="post" enctype="multipart/form-data">
  <div class="modal fade" id="createBillModal" tabindex="-1" role="dialog" aria-labelledby="createBillModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createBillModalLabel">Paybill</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $_GET['id']?>">
          <div class="container">
            <div class="row">
              <div class="col-md-12">

              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <?php $tmp_price = 0 ?>
                    <tbody>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_services s inner join tbl_services ss on ss.id = s.service_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td style="text-wrap:nowrap"><?= $row['name'] ?></td>
                        <td>Service</td>
                        <td><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'],2) ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?>
                        </td>
                      </tr>
                      <?php $tmp_price += $row['price'] *( $row['qty']??0) ?>
                      <?php } ?>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_equipment s inner join tbl_equipment ss on ss.id = s.equipment_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td style="text-wrap:nowrap"><?= $row['name'] ?></td>
                        <td>Equipment</td>
                        <td><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'],2) ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?>
                        </td>
                      </tr>
                      <?php $tmp_price += $row['price'] *( $row['qty']??0) ?>
                      <?php } ?>
                      <?php foreach (get_all("select s.*,m.price,m.name from tbl_appointment_medicine s inner join tbl_medicine_stock ms on ms.id = s.medicine_stock_id inner join tbl_medicine m on m.id = ms.medicine_id where s.appointment_id = $id order by m.id asc") as $row) { ?>
                      <tr>
                        <td style="text-wrap:nowrap"><?= $row['name'] ?></td>
                        <td>Medicine</td>
                        <td><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'],2) ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?>
                        </td>
                      </tr>
                      <?php $tmp_price += $row['price'] *( $row['qty']??0) ?>
                      <?php } ?>
                      <tr>
                        <td colspan="4"><b>Discounted (PWD,SENIOR)</b></td>
                        <td style="text-align: right;">
                          <input type="checkbox" name="discounted" id="discounted"
                            <?= ($paid_data->discount_flag ?? 0) ? 'checked' : '' ?> value="1"
                            <?= ($paid_data->id ?? 0) ? 'disabled' : '' ?>>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Discount 20%</b> </td>
                        <td style="text-align: right;" id="discount_display">0.00</td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Subtotal</b></td>
                        <td style="text-align: right;" id="subtotal_display"><?= number_format($tmp_price,2) ?></td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Total</b></td>
                        <td style="text-align: right;" id="total_display"><?= number_format($tmp_price,2) ?></td>
                        <input type="hidden" id="total_raw" value="<?= $tmp_price ?>">
                      </tr>
                      <tr>
                        <td colspan="4"><b>Amount</b></td>
                        <td style="text-align: right;">
                          <input type="text" name="amount" class="form-control" id="amount"
                            value="<?= ($paid_data->amount ?? 0) ? $paid_data->amount : '0.00' ?>"
                            style="text-align: right;" <?= ($paid_data->id ?? 0) ? 'disabled' : '' ?> required>
                          <input type="hidden" name="total" id="total" value="<?= $tmp_price ?>">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Change</b></td>
                        <td style="text-align: right;" id="change">
                          <?= ($paid_data->change ?? 0) ? $paid_data->change : '0.00' ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="patient_id" value="<?= $appointment->patient_id ?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="pay_appointment" class="btn btn-primary"
            <?= ($paid_data->id ?? 0) ? 'disabled' : '' ?>>Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
let amount = document.getElementById('amount');
let discounted = document.getElementById('discounted');
amount.addEventListener('keypress', calc);
discounted.addEventListener('change', calc);

function calc() {
  let discounted = document.getElementById('discounted');
  let total_raw = document.getElementById('total_raw').value;
  let discount_display = document.getElementById('discount_display');

  let discount_value = (discounted.checked) ? -(parseFloat(total_raw) * 0.2) : -0.00;
  discount_display.innerText = discount_value.toLocaleString("en-US", {
    style: 'decimal',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });

  let total_display = document.getElementById('total_display');
  let total_value = (parseFloat(total_raw) - parseFloat(Math.abs(discount_value)));
  total_display.innerText = total_value.toLocaleString("en-US", {
    style: 'decimal',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });

  console.log(total_raw);
  console.log(discount_value);
  let amount = document.getElementById('amount');

  amount.setAttribute("min", Math.abs(total_value));

  let total = document.getElementById('total');
  let change = document.getElementById('change');
  let sum = parseFloat(total_value) - parseFloat(amount.value || 0)
  change.innerText = Math.abs(sum).toLocaleString("en-US", {
    style: 'decimal',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
}
</script>