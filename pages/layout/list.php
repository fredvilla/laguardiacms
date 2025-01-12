  <?php
  if (isset($_POST['delete'])) {
    echo delete($list_del_msg);
  }
  ?>
  <style type="text/css" media="print">
    @page {
      size: landscape;
    }
  </style>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $list_title ?> <?= (strpos($_SERVER['REQUEST_URI'], 'reports') === true) ? 'List' : '' ?></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="<?= (strpos($_SERVER['REQUEST_URI'], 'reports') === false) ? 'dataTable' : 'printTable' ?>" width="100%" cellspacing="0">

          <thead>
            <tr>
              <!-- Headers -->
              <?php foreach ($list_header as $res) { ?>
                <th><?= $res ?></th>
              <?php } ?>
              <!-- End Headers -->
              <!-- Enabled Actions -->
              <?php if ($list_enable_actions) { ?><th>Actions</th><?php } ?>
              <!-- End Enabled Actions -->
            </tr>
          </thead>
          <?php


          ?>

          <tbody>
            <?php foreach (get_all($list_sql) as $row) { ?>
              <tr>
                <?php foreach ($list_column as $subres) { ?>

                  <td style="text-transform:uppercase;<?= $subres == 'amount' ? 'text-align:right' : '' ?>"> <?= $subres == 'amount' ? number_format(($row[$subres] ?? 0), 2) : $row[$subres] ?></td>
                <?php } ?>

                <!-- Enable Actions -->
                <?php if ($list_enable_actions) { ?>

                  <td class="d-flex">
                    <?php if ($list_actions['view']) { ?><a href="<?= field_replacer($list_actions['view'], $list_sql, $row) ?>&id=<?= $row['id']; ?>" class="btn btn-primary" style="margin-right:.25rem"><i class="fa fa-eye"></i></a><?php } ?>
                    <?php if ($list_actions['edit']) { ?><a href="<?= field_replacer($list_actions['edit'], $list_sql, $row) ?>&id=<?= $row['id']; ?>" class="btn btn-success" style="margin-right:.25rem"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php if ($list_actions['delete']) { ?>
                      <?php $table = ($table == 'User') ? ':access' : $table  ?>
                      <form method="post">
                        <input type="hidden" name="table" value="<?= field_replacer($table, $list_sql, $row) ?>">
                        <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </form>
                    <?php } ?>
                  </td>
                <?php } ?>
                <!-- End Enabled Actions -->
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>