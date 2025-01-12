            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= (in_array(get_last_url(), ['index.php'])) ? 'active' : '' ?>">
              <a class="nav-link" href="index.php">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Doctor -->
            <?php if (in_array($_SESSION['auth'], [2])) { ?>
              <li class="nav-item <?= (in_array(get_last_url(), ['list_appointment.php', 'view_appointment.php', 'edit_appointment.php'])) ? 'active' : '' ?>">
                <a class="nav-link" href="list_appointment.php">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Appointments</span></a>

              </li>
              <li class="nav-item <?= (in_array(get_last_url(), ['list_patient.php', 'view_user.php'])) ? 'active' : '' ?>">
                <a class="nav-link" href="list_patient.php">
                  <i class="fas fa-fw fa-user-injured"></i>
                  <span>Patient</span></a>
              </li>
              <li class="nav-item  <?= (in_array(get_last_url(), ['list_medical_record.php', 'view_user.php'])) ? 'active' : '' ?>">
                <a class="nav-link" href="list_medical_record.php">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Medical Record</span></a>
              </li>
            <?php } ?>
            <!-- Admin,Staff,Patient -->
            <?php if (in_array($_SESSION['auth'], [1, 3, 4])) { ?>
              <?php if (!in_array($_SESSION['auth'], [3])) { ?>
                <li class="nav-item <?= (in_array(get_last_url(), ['list_users.php', 'view_user.php', 'edit_user.php'])) ? 'active' : '' ?>">
                  <a class="nav-link" href="list_users.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
                </li>
              <?php } ?>
              <?php if (!in_array($_SESSION['auth'], [3])) { ?>
                <li class="nav-item <?= (in_array(get_last_url(), ['list_service.php', 'view_service.php', 'edit_service.php'])) ? 'active' : '' ?>">
                  <a class="nav-link" href="list_service.php">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Services</span></a>
                </li>
              <?php } ?>
              <li class="nav-item <?= (in_array(get_last_url(), ['list_appointment.php', 'view_appointment.php', 'edit_appointment.php'])) ? 'active' : '' ?>">
                <a class="nav-link" href="list_appointment.php">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Appointments</span></a>
              </li>
              <?php if (in_array($_SESSION['auth'], [3])) { ?>
                <li class="nav-item <?= (in_array(get_last_url(), ['list_medical_record.php'])) ? 'active' : '' ?>">
                  <a class="nav-link" href="list_medical_record.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Medical Record</span></a>
                </li>
              <?php } ?>
              <?php if (in_array($_SESSION['auth'], [1, 4])) { ?>
                <li class="nav-item <?= (in_array(get_last_url(), ['list_medicine.php', 'view_medicine.php', 'edit_medicine.php', 'view_medicine_batch.php', 'list_equipment.php', 'view_equipment.php', 'edit_equipment.php'])) ? 'active' : '' ?>">
                  <a class="nav-link <?= (!in_array(get_last_url(), ['list_medicine.php', 'view_medicine_batch.php', 'view_medicine.php', 'edit_medicine.php'])) ? 'collapsed' : '' ?>" href="#" data-toggle="collapse" data-target="#inventory" aria-expanded="true" aria-controls="inventory">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Inventory</span>
                  </a>
                  <div id="inventory" class="collapse <?= (in_array(get_last_url(), ['list_medicine.php', 'view_medicine.php', 'edit_medicine.php', 'view_medicine_batch.php', 'list_equipment.php', 'view_equipment.php', 'edit_equipment.php'])) ? 'show' : '' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item <?= (in_array(get_last_url(), ['list_medicine.php', 'view_medicine.php', 'edit_medicine.php', 'view_medicine_batch.php'])) ? 'active' : '' ?>" href="list_medicine.php"> <i class="fa-solid fa-prescription-bottle-alt"></i>
                        Medicine</a>
                      <a class="collapse-item <?= (in_array(get_last_url(), ['list_equipment.php', 'view_equipment.php', 'edit_equipment.php'])) ? 'active' : '' ?>" href="list_equipment.php"> <i class="fa-solid fa-x-ray"></i>
                        Laboratory/Equipment</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item <?= (in_array(get_last_url(), ['list_medicine_category.php', 'list_equipment_category.php', 'list_service_category.php'])) ? 'active' : '' ?>">
                  <a class="nav-link <?= (!in_array(get_last_url(), ['list_medicine_category.php', 'list_equipment_category.php', 'list_service_category.php', 'edit_medicine_category.php', 'edit_equipment_category.php', 'edit_service_category.php'])) ? 'collapsed' : '' ?>" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true" aria-controls="category">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Category</span>
                  </a>
                  <div id="category" class="collapse <?= (in_array(get_last_url(), ['list_medicine_category.php', 'list_equipment_category.php', 'list_service_category.php', 'edit_medicine_category.php', 'edit_equipment_category.php', 'edit_service_category.php'])) ? 'show' : '' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item <?= (in_array(get_last_url(), ['list_medicine_category.php', 'view_medicine_category.php', 'edit_medicine_category.php'])) ? 'active' : '' ?>" href="list_medicine_category.php"> <i class="fa-solid fa-list"></i>
                        Medicine</a>
                      <a class="collapse-item <?= (in_array(get_last_url(), ['list_equipment_category.php', 'view_equipment_category.php', 'edit_equipment_category.php'])) ? 'active' : '' ?>" href="list_equipment_category.php"> <i class="fa-solid fa-list"></i>
                        Laboratory/Equipment</a>
                      <a class="collapse-item <?= (in_array(get_last_url(), ['list_service_category.php', 'view_service_category.php', 'edit_service_category.php'])) ? 'active' : '' ?>" href="list_service_category.php"> <i class="fa-solid fa-list"></i>
                        Services</a>
                    </div>
                  </div>
                </li>
                <?php if (in_array($_SESSION['auth'], [1])) { ?>
                  <li class="nav-item <?= (in_array(get_last_url(), ['reports.php'])) ? 'active' : '' ?>">
                    <a class="nav-link" href="reports.php">
                      <i class="fas fa-fw fa-file"></i>
                      <span>Reports</span></a>
                  </li>
                <?php } ?>
              <?php } ?>


              <!-- <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
                aria-controls="users">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
              </a>
              <div id="users" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                  <a class="collapse-item" href="list_doctor.php"> <i class="fa-solid fa-user-doctor"></i>
                    Doctor</a>
                  <?php if (in_array($_SESSION['auth'], [1, 2])) { ?>
                  <a class="collapse-item" href="list_staff.php"> <i class="fa-solid fa-user-md"></i>
                    Staff</a>
                  <?php } ?>
                  <?php if (in_array($_SESSION['auth'], [1, 2, 4])) { ?>
                  <a class="collapse-item" href="list_patient.php"> <i class="fa-solid fa-user-injured"></i></i>
                    Patient</a>
                  <?php } ?>
                  <?php if (in_array($_SESSION['auth'], [1])) { ?>
                  <a class="collapse-item" href="list_admin.php"> <i class="fa-solid fa-user-shield"></i></i>
                    Administrator</a>
                  <?php } ?>
                </div>
              </div>
            </li> -->

            <?php } ?>