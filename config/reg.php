<?php
include "../config/conn.php";

if (isset($_POST['reg_btn'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $cn = mysqli_real_escape_string($conn, $_POST['cn']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $cs = mysqli_real_escape_string($conn, $_POST['cs']);
    $addrss = mysqli_real_escape_string($conn, $_POST['addrss']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $eml = mysqli_real_escape_string($conn, $_POST['eml']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

    if ($pass == $cpass) {

        // check email
        $checkemail = "SELECT email FROM patient WHERE email='$eml'";
        $checkemail_run = mysqli_query($conn, $checkemail);

        if (mysqli_num_rows($checkemail_run) > 0) {

            // Email Already Exist
            $_SESSION['msg'] = "Email Already Exist";
            header("Location: ../register.php");
            exit(0);
        } else {
            $user_query = "INSERT INTO patient (fname,age,cn,gender,cs,addrss,uname,email,password)
            VALUES ('$fname','$age','$cn','$gender','$cs','$addrss','$uname','$eml','$pass')";
            $user_query_run = mysqli_query($conn, $user_query);

            if (($user_query_run)) {
                $_SESSION['msge'] = "Registration Successfully";
                header("Location: ../index.php");
                exit(0);
            } else {
                $_SESSION['msg'] = "Something Went Wrong";
                header("Location: ../register.php");
                exit(0);
            }
        }
    } else {
        $_SESSION['msg'] = "Password and Confirm Password does not match";
        header("Location: ../register.php");
        exit(0);
    }
} else {
    header("Location: ../register.php");
    exit(0);
}
