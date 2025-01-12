<?php
include '../config/conn.php';

//Start of admin Medicine
if (isset($_POST['del_med'])) {
    $med_id = $_POST['del_med'];

    $query = "DELETE FROM medicine WHERE id='$med_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Medicine Deleted Successfully";
        header('Location: ../admin/medicine.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/medicine.php');
        exit(0);
    }
}

if (isset($_POST['add_med'])) {

    $mn = $_POST['mn'];
    $desc = $_POST['disc'];
    $mt = $_POST['mt'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $checkmn = "SELECT mn FROM medicine WHERE mn='$mn'";
    $checkmn_run = mysqli_query($conn, $checkmn);

    if (mysqli_num_rows($checkmn_run) > 0) {

        $_SESSION['msg'] = "Medicine Already Exist";
        header('Location: ../admin/medicine.php');
        exit(0);
    }

    $query = "INSERT INTO medicine (mn, disc, mt, price, stock)
    VALUES ('$mn','$desc','$mt','$price','$stock')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Registered Successfully";
        header('Location: ../admin/medicine.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/medicine.php');
        exit(0);
    }
}

if (isset($_POST['add_lab'])) {

    $si = $_POST['si'];
    $disc = $_POST['disc'];
    $price = $_POST['price'];

    $checklab = "SELECT si FROM lab WHERE si='$si'";
    $checklab_run = mysqli_query($conn, $checklab);

    if (mysqli_num_rows($checklab_run) > 0) {

        $_SESSION['msg'] = "Instrument Already Exist";
        header('Location: ../admin/lab.php');
        exit(0);
    }

    $query = "INSERT INTO lab (si, disc, price)
    VALUES ('$si','$disc','$price')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Registered Successfully";
        header('Location: ../admin/lab.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/lab.php');
        exit(0);
    }
}



if (isset($_POST['update_btn'])) {

    $med_id = $_POST['med_id'];
    $mn = $_POST['mn'];
    $desc = $_POST['disc'];
    $mt = $_POST['mt'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $query = "UPDATE medicine SET mn='$mn',disc='$desc',mt='$mt',price='$price',stock='$stock'
    WHERE id='$med_id' ";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Updated Successfully";
        header('Location: ../admin/medicine.php');
        exit(0);
    }
}
//End of admin Medicine


// Start of admin lab
if (isset($_POST['del_lab'])) {
    $lab_id = $_POST['del_lab'];

    $query = "DELETE FROM lab WHERE id='$lab_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Laboratory Instrument Deleted Successfully";
        header('Location: ../admin/lab.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/lab.php');
        exit(0);
    }
}
if (isset($_POST['lupdate_btn'])) {

    $lab_id = $_POST['lab_id'];
    $si = $_POST['si'];
    $desc = $_POST['disc'];
    $price = $_POST['price'];


    $query = "UPDATE lab SET si='$si',disc='$desc'',price='$price',
    WHERE id='$lab_id' ";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Updated Successfully";
        header('Location: ../admin/lab.php');
        exit(0);
    }
}
// End of admin lab


//Start of staff Medicine
if (isset($_POST['del_smed'])) {
    $med_id = $_POST['del_smed'];

    $query = "DELETE FROM medicine WHERE id='$med_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msg'] = "Medicine Deleted Successfully";
        header('Location: ../staff/medicine.php');
        exit(0);
    } else {
        $_SESSION['msge'] = "Something Went Wrong";
        header('Location:../staff/medicine.php');
        exit(0);
    }
}

if (isset($_POST['add_smed'])) {

    $mn = $_POST['mn'];
    $desc = $_POST['disc'];
    $mt = $_POST['mt'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $checkmn = "SELECT mn FROM medicine WHERE mn='$mn'";
    $checkmn_run = mysqli_query($conn, $checkmn);

    if (mysqli_num_rows($checkmn_run) > 0) {

        $_SESSION['msg'] = "Medicine Already Exist";
        header('Location: ../staff/medicine.php');
        exit(0);
    }

    $query = "INSERT INTO medicine (mn, disc, mt, price, stock)
    VALUES ('$mn','$desc','$mt','$price','$stock')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Registered Successfully";
        header('Location: ../staff/medicine.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../staff/medicine.php');
        exit(0);
    }
}

if (isset($_POST['supdate_btn'])) {

    $med_id = $_POST['med_id'];
    $mn = $_POST['mn'];
    $desc = $_POST['disc'];
    $mt = $_POST['mt'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $ed = date($_POST['ed']);

    $query = "UPDATE medicine SET mn='$mn',disc='$desc',mt='$mt',price='$price',stock='$stock',ed='$ed'
    WHERE id='$med_id' ";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Updated Successfully";
        header('Location: ../staff/medicine.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/doctor.php');
        exit(0);
    }
}
//End of staff Medicine



//Start of Doctor

if (isset($_POST['del_doc'])) {
    $doc_id = $_POST['del_doc'];

    $query = "DELETE FROM doctor WHERE id='$doc_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msg'] = "Doctor Deleted Successfully";
        header('Location: ../admin/doctor.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/doctor.php');
        exit(0);
    }
}

if (isset($_POST['add_doc'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $cn = $_POST['cn'];
    $addrss = $_POST['addrss'];
    $uname = $_POST['uname'];
    $eml = $_POST['eml'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass == $cpass) {

        $checkdn = "SELECT fname FROM doctor WHERE fname='$fname'";
        $checkdn_run = mysqli_query($conn, $checkdn);

        if (mysqli_num_rows($checkdn_run) > 0) {

            $_SESSION['msg'] = "Doctor Already Exist";
            header('Location: ../admin/doctor.php');
            exit(0);
        }

        $query = "INSERT INTO doctor (fname,mname,lname, cn, addrss, uname, email, password)
    VALUES ('$fname','$mname','$lname','$cn','$addrss','$uname','$eml','$pass')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['msge'] = "Registered Successfully";
            header('Location: ../admin/doctor.php');
            exit(0);
        } else {
            $_SESSION['msg'] = "Something Went Wrong";
            header('Location:../admin/doctor.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "Password and Confirm Password does not match";
        header('Location:../admin/doctor.php');
        exit(0);
    }
}
//End of Doctor


//Start of Staff

if (isset($_POST['del_staff'])) {
    $staff_id = $_POST['del_staff'];

    $query = "DELETE FROM staff WHERE id='$staff_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msg'] = "Staff Deleted Successfully";
        header('Location: ../admin/staff.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/staff.php');
        exit(0);
    }
}

if (isset($_POST['add_staff'])) {

    extract($_POST);

    if ($pass == $cpass) {

        $checkdn = "SELECT fname FROM staff WHERE fname='$fname'";
        $checkdn_run = mysqli_query($conn, $checkdn);

        if (mysqli_num_rows($checkdn_run) > 0) {

            $_SESSION['msg'] = "Staff Already Exist";
            header('Location: ../admin/staff.php');
            exit(0);
        }

        $checkeml = "SELECT email FROM staff WHERE email='$eml'";
        $checkeml_run = mysqli_query($conn, $checkeml);

        if (mysqli_num_rows($checkeml_run) > 0) {

            $_SESSION['msg'] = "Email Already Exist";
            header('Location: ../admin/staff.php');
            exit(0);
        }

        $query = "INSERT INTO staff (fname,mname,lname, cn, uname, email, password, province_id, city_id, barangay_id, house_no, zip_code)
    VALUES ('$fname','$mname','$lname','$cn','$uname','$eml','$pass','$province_id','$barangay_id','$house_no','$zip_code')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['msge'] = "Registered Successfully";
            header('Location: ../admin/staff.php');
            exit(0);
        } else {
            $_SESSION['msg'] = "Something Went Wrong";
            header('Location:../admin/staff.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "Password and Confirm Password does not match";
        header('Location:../admin/staff.php');
        exit(0);
    }
}
//End of Staff


//Start of Doctor

if (isset($_POST['del_doc'])) {
    $doc_id = $_POST['del_doc'];

    $query = "DELETE FROM doctor WHERE id='$doc_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msg'] = "Doctor Deleted Successfully";
        header('Location: ../admin/doctor.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/doctor.php');
        exit(0);
    }
}

if (isset($_POST['add_doc'])) {

    extract($_POST);

    if ($pass == $cpass) {

        $checkdn = "SELECT fname FROM doctor WHERE fname='$fname'";
        $checkdn_run = mysqli_query($conn, $checkdn);

        if (mysqli_num_rows($checkdn_run) > 0) {

            $_SESSION['msg'] = "Doctor Already Exist";
            header('Location: ../admin/doctor.php');
            exit(0);
        }

        $query = "INSERT INTO doctor (fname,mname,lname, cn, uname, email, password, province_id, city_id, barangay_id, house_no, zip_code)
    VALUES ('$fname','$mname','$lname','$cn','$uname','$eml','$pass','$province_id','$barangay_id','$house_no','$zip_code')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['msge'] = "Registered Successfully";
            header('Location: ../admin/doctor.php');
            exit(0);
        } else {
            $_SESSION['msg'] = "Something Went Wrong";
            header('Location:../admin/doctor.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "Password and Confirm Password does not match";
        header('Location:../admin/doctor.php');
        exit(0);
    }
}
//End of Doctor


//Start of Staff

if (isset($_POST['del_admin'])) {
    $admin_id = $_POST['del_admin'];

    $query = "DELETE FROM admin WHERE id='$admin_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msg'] = "Staff Deleted Successfully";
        header('Location: ../admin/administrator.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Something Went Wrong";
        header('Location:../admin/administrator.php');
        exit(0);
    }
}

if (isset($_POST['add_admin'])) {

    extract($_POST);

    if ($pass == $cpass) {

        $checkan = "SELECT fname FROM admin WHERE fname='$fname'";
        $checkan_run = mysqli_query($conn, $checkan);

        if (mysqli_num_rows($checkan_run) > 0) {

            $_SESSION['msg'] = "Admin Already Exist";
            header('Location: ../admin/administrator.php');
            exit(0);
        }

        $checkeml = "SELECT email FROM admin WHERE email='$eml'";
        $checkeml_run = mysqli_query($conn, $checkeml);

        if (mysqli_num_rows($checkeml_run) > 0) {

            $_SESSION['msg'] = "Email Already Exist";
            header('Location: ../admin/administrator.php');
            exit(0);
        }

        $query = "INSERT INTO admin (fname,mname,lname, cn, uname, email, password, province_id, city_id, barangay_id, house_no, zip_code)
    VALUES ('$fname','$mname','$lname','$cn','$uname','$eml','$pass','$province_id','$barangay_id','$house_no','$zip_code')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['msge'] = "Registered Successfully";
            header('Location: ../admin/administrator.php');
            exit(0);
        } else {
            $_SESSION['msg'] = "Something Went Wrong";
            header('Location:../admin/administrator.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "Password and Confirm Password does not match";
        header('Location:../admin/administrator.php');
        exit(0);
    }
}
//End of Staff

// Start of patient

if (isset($_POST['add_patient'])) {

    extract($_POST);

    if ($pass == $cpass) {

        $checkan = "SELECT fname FROM patient WHERE fname='$fname'";
        $checkan_run = mysqli_query(
            $conn,
            $checkan
        );

        if (
            mysqli_num_rows($checkan_run) > 0
        ) {

            $_SESSION['msg'] = "Patient Already Exist";
            header('Location: ../admin/patients.php');
            exit(0);
        }

        $checkeml = "SELECT patient FROM admin WHERE email='$eml'";
        $checkeml_run = mysqli_query($conn, $checkeml);

        if (
            mysqli_num_rows($checkeml_run) > 0
        ) {

            $_SESSION['msg'] = "Email Already Exist";
            header('Location: ../admin/patients.php');
            exit(0);
        }

        $query = "INSERT INTO patient (fname,mname,lname, cn, uname, email, password, province_id, city_id, barangay_id, house_no, zip_code)
    VALUES ('$fname','$mname','$lname','$cn','$uname','$eml','$pass','$province_id','$barangay_id','$house_no','$zip_code')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['msge'] = "Registered Successfully";
            header('Location: ../admin/patients.php');
            exit(0);
        } else {
            $_SESSION['msg'] = "Something Went Wrong";
            header('Location:../admin/patients.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "Password and Confirm Password does not match";
        header('Location:../admin/patients.php');
        exit(0);
    }
}

if (isset($_POST['approve'])) {
    $appid = $_POST['appid'];
    $query = "UPDATE patient SET status='1' WHERE id = '$appid'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['msge'] = "Updated Successfully";
        header('Location: ../staff/appointment.php');
        exit(0);
    }
}


// add appointment

if (isset($_POST['add_app'])) {
    $fname = $_POST['fname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $remark = $_POST['remark'];
    $status = $_POST['status'];

    $sql = "INSERT INTO patient(fname,date,time,remark,status)VALUES('$fname','$date','$time','$remark','$status')";

    $run = mysqli_query($conn, $sql);

    if ($run == true) {

        $_SESSION['msge'] = "Registered Successfully";
        header('Location: ../patient/appointment.php');
        exit(0);
    } else {
        $_SESSION['msge'] = "Somthing Went Wrong";
        header('Location: ../patient/appointment.php');
        exit(0);
    }
}
