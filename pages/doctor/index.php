<?php
include_once('../layout/header.php');
?>


<!-- Begin Page Content -->

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    <!-- Digital Clock Start -->
    <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ">
      <div class="time"></div>
      <div class="date"></div>
    </div>
    <!-- Digital Clock End -->

  </div>


  <!-- Content Row -->
  <div class="row">
    <?= isset($_POST['create_appointmentv2']) ?create_appointmentv2() : ''; ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Doctors</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php

                $query = "SELECT id FROM doctor ORDER BY id";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4>' . $row . '</h4>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user-doctor fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Staff</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT id FROM staff ORDER BY id";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4>' . $row . '</h4>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Total Patients</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT id FROM patient ORDER BY id";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4>' . $row . '</h4>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user-injured fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Medicines</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT id FROM medicine ORDER BY id";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4>' . $row . '</h4>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-suitcase-medical fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
$tmp = calendar_monthly_slots();
  foreach (get_all("select UPPER(CONCAT(a.status,' - ' ,IFNULL(p.fname,''),' ',IFNULL(p.mname, ''),' ',IFNULL(p.lname,''))) as title,
concat(a.appointment_date,'T', t.start) as start,
concat(a.appointment_date,'T', t.end) as end,
concat('edit_appointment.php?id=',a.id) as url,
case
    when a.status = 'pending' then 'yellow'
    when a.status = 'approved' then 'green'
    when a.status = 'completed' then 'green'
    when a.status = 'rejected' then 'red'
    when a.status = 'cancelled' then 'red'
    when a.status = 'reschedule' then 'blue'
end    
as backgroundColor,
if(a.status = 'pending', 'black', 'white')as textColor 
 from tbl_appointment a left join patient p on p.id = a.patient_id inner join tbl_time t on t.id = a.time_id where a.doctor_id = " . $_SESSION['user']->id . "") as $res) {
    $tmp[$res['start']] = $res;
}
$tmp = array_values($tmp);
  ?>
  <script>
  var public_events = <?php echo json_encode($tmp) ?>;
  </script>
  <div id="calendar"></div>
  <?php
  include_once('../layout/footer.php');
  include_once('modal_create_appointment.php');
  ?>