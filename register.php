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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/dashboard.css" rel="stylesheet">

</head>

<body>

  <section class="vh-150" style="background-color: #4e73df;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-8">
          <div class="card shadow-2-strong" style="border-radius: 8px;">
            <div class="card-body p-5 text-center">
              <?php include('msg.php'); ?>
              <h3 class="mb-5">Create an Account</h3>

              <form action="config/reg.php" method="post">
                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Full Name: </label>
                  <input type="text" name="fname" id="" class="form-control form-control" required />
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>age: </label>
                  <input type="number" name="age" id="" class="form-control form-control" required />
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Contact Number: </label>
                  <input type="number" pattern=”[1-9]{1}[0-9]{9}” name="cn" id="" class="form-control form-control" required />
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Gender: </label>
                  <select type="text" name="gender" id="" class="form-control form-control" required>
                    <option selected>--Select--</option>
                    <option>Female</option>
                    <option>Male</option>
                  </select>
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Civil Status: </label>
                  <select type="text" name="cs" id="" class="form-control form-control" required>
                    <option selected>--Select--</option>
                    <option>Single</option>
                    <option>Married</option>
                    <option>Separated</option>
                  </select>
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Address: </label>
                  <textarea type="text" name="addrss" id="" class=" form-control form-control" required> </textarea>
                </div>

                <hr>
                <h5 style="color:#4e73df; text-align: left;">Login Credentials</h5>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Username: </label>
                  <input type="text" name="uname" id="" class="form-control form-control" required />
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Email: </label>
                  <input type="email" name="eml" id="" class="form-control form-control" required />
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Password: </label>
                  <input type="password" name="pass" class="form-control form-control" id="Show" required />
                </div>

                <div style="text-align: left;" class="form-outline mb-4">
                  <label>Confirm Password: </label>

                  <input type="password" name="cpass" class="form-control form-control" id="show" required />
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" onclick="myFunction()" />
                  <label class="form-check-label"> Show Password </label>
                </div>

                <button type="submit" name="reg_btn" class="btn btn-primary btn-lg btn-block">Register</button>
              </form>
              <br>
              <div class="text-center">
                <a class="big" href="index.php">Already have an Account? Login!</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; <script>
            document.write(new Date().getFullYear())
          </script> Capstone Project</span>
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