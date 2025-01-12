<?php
require_once('config/functions.php');
if (isset($_SESSION['auth'])) {
  switch ($_SESSION['auth']) {
    case 1:
      return header('location:pages/admin/index.php');
      break;
    case 2:
      return header('location:pages/doctor/index.php');
      break;
    case 3:
      return header('location:pages/patient/index.php');
      break;
    case 4:
      return header('location:pages/staff/index.php');
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laguardia Medical and Diagnostic Clinic Management System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <section class="vh-100" style="background-color: #4e73df;">
      <div class="container py-5 h-100">

        <div class="row d-flex justify-content-center align-items-center h-100">


          <div class="col-12 col-md-8 col-lg-6 col-xl-6">
            <div class="card shadow-2-strong" style="border-radius: 8px;">

              <div class="card-body p-5 text-center">
                <?= isset($_POST['login_btn']) ? login() : '' ?>
                <img src="img/logo.png" height="100" width="100">
                <br> <br>
                <h3 class="mb-5">Laguardia Medical and Diagnostic Clinic Management System</h3>

                <form method="post">
                  <div class="form-outline mb-4">
                    <label>Email</label>
                    <input type="email" name="uname" id="" class="form-control form-control-lg" required
                      value="<?= isset($_POST['uname']) ? $_POST['uname'] : '' ?>" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <input type="password" name="pass" id="Show" class="form-control form-control-lg" required
                      value="<?= isset($_POST['pass']) ? $_POST['pass'] : '' ?>" />
                  </div>

                  <!-- Checkbox -->
                  <!-- <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                      onclick="myFunction()" />
                    <label class="form-check-label"> Show Password </label>
                  </div> -->

                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="login_btn">Login</button>
                </form>
                <!-- <br>
                <div class="text-center">
                  <a class="big" href="register.php">Don't have an Account? Register!</a>
                </div> -->


              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; <script>
            document.write(new Date().getFullYear())
            </script> Capstone Project</span> -->
        </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="../js/sb-admin-2.min.js"></script>

      <!-- Page specific plugin JavaScript -->
      <script src="js/showpass.js"></script>

  </body>

</html>