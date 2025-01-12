<?php
require_once('config/functions.php');
require_once('vendor/autoload.php');
extract($_GET);

use setasign\Fpdi\Fpdi;

if (!isset($_GET['id'])) {
  // || !check_exists('tbl_appointment','id',$id)
  echo 'No Record Found!';
  die;
}

$appointment = get_one("select * from tbl_appointment where id = $id");
$doctor = get_one("select * from doctor where id = $appointment->doctor_id");
$patient = get_one("select p.*,pp.name as province,c.name as city,b.name as barangay from patient p left join tbl_province pp on pp.id = p.province_id 
left join tbl_city c on c.id = p.city_id left join tbl_barangay b on b.id = p.barangay_id 
where p.id = $appointment->patient_id");

$pdf = new Fpdi();
$pdf->AddPage();
$pdf->setSourceFile("files/pdf/$type.pdf");
$tplId = $pdf->importPage(1);
$pdf->useTemplate($tplId, 0, 0);
$pdf->SetFont('Arial', '', 9);


$date = date('F d, Y');
$patient_name = strtoupper($patient->fname . ' ' . $patient->mname . ' ' . $patient->lname);
$doctor_name = strtoupper($doctor->fname . ' ' . $doctor->lname);
$services = get_all("select s.qty,s.result,ss.name from tbl_appointment_services s inner join tbl_services ss on ss.id = s.service_id where s.appointment_id = $id");
$equipments = get_all("select s.qty,s.result,ss.name from tbl_appointment_equipment s inner join tbl_equipment ss on ss.id = s.equipment_id where s.appointment_id = $id");
$medicines = get_all("select s.qty,s.result,ss.name from tbl_appointment_medicine s inner join tbl_medicine ss on ss.id = s.medicine_stock_id where s.appointment_id = $id");
$address = ($patient->barangay ?? '') . ' ' . ($patient->zip_code ?? '') . ' ' . ($patient->city ?? '') . ' ' . ($patient->province ?? '');

switch ($type) {
  case 'medical_cert':
    $pdf->Cell(133);
    $pdf->Cell(1, 120, $date);
    $pdf->Cell(-35);
    $pdf->Cell(72, 175, $patient_name, 0, 1, 'C');
    $pdf->SetXY(83, 111);
    $pdf->Cell(41, 5, $doctor_name, 0, 1, 'C');
    $line = 118;
    foreach ($services as $res) {
      $pdf->SetXY(25, $line);
      $pdf->Cell(158, 5, strtoupper($res['name'] . ' - ' . $res['qty'] . ' QTY' . ';Result :' . (!empty($res['result']) ? $res['result'] : 'TBD')), 0, 1, 'L');
      $line += 5;
    }
    $pdf->SetXY(127, 190);
    $pdf->Cell(51, 5, $doctor_name, 0, 1, 'C');
    break;
  case 'diagnostic':
    $pdf->Cell(147);
    $pdf->Cell(1, 137, $date);
    $pdf->SetXY(44, 77);
    $pdf->Cell(102, 4, $patient_name, 0, 1, 'L');
    $pdf->SetXY(37, 81);
    $pdf->Cell(102, 4, $address, 0, 1, 'L');
    $line = 92;
    foreach ($medicines as $res) {
      $pdf->SetXY(23.5, $line);
      $pdf->Cell(85, 10, strtoupper($res['name']), 0, 1, 'C');
      $pdf->SetXY(109, $line);
      $pdf->Cell(9, 9, strtoupper($res['qty']), 0, 1, 'C');
      $pdf->SetXY(142, $line);
      $pdf->Cell(56, 9, strtoupper($res['result'] ?? 'TBA'), 0, 1, 'C');
      $line += 10;
    }
    break;
  case 'receipt':
    $pdf->Cell(147);
    $pdf->Cell(1, 137, $date);
    $pdf->SetXY(44, 77);
    $pdf->Cell(102, 4, $patient_name, 0, 1, 'L');
    $pdf->SetXY(37, 81);
    $pdf->Cell(102, 4, $address, 0, 1, 'L');
    $line = 92;
    $tmp_price = 0;

    $pdf->SetXY(13.5, $line);
    $pdf->Cell(50, 8, "NAME", 1, 1, 'C');
    $pdf->SetXY(63.5, $line);
    $pdf->Cell(25, 8, "TYPE", 1, 1, 'C');
    $pdf->SetXY(88.5, $line);
    $pdf->Cell(25, 8, "QTY", 1, 1, 'C');
    $pdf->SetXY(113.5, $line);
    $pdf->Cell(50, 8, "PRICE", 1, 1, 'C');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, "SUBTOTAL", 1, 1, 'C');
    $line += 8;
    foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_services s inner join tbl_services ss on ss.id = s.service_id where s.appointment_id = $id") as $row) {
      $pdf->SetXY(13.5, $line);
      $pdf->Cell(50, 8, strtoupper($row['name']), 1, 1, 'C');
      $pdf->SetXY(63.5, $line);
      $pdf->Cell(25, 8, "SERVICE", 1, 1, 'C');
      $pdf->SetXY(88.5, $line);
      $pdf->Cell(25, 8, strtoupper($row['qty'] ?? 0), 1, 1, 'C');
      $pdf->SetXY(113.5, $line);
      $pdf->Cell(50, 8, number_format($row['price'], 2), 1, 1, 'R');
      $pdf->SetXY(163.5, $line);
      $pdf->Cell(40, 8, number_format($row['price'] * ($row['qty'] ?? 0), 2), 1, 1, 'R');
      $tmp_price += $row['price'] * ($row['qty'] ?? 0);
      $line += 8;
    }

    foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_equipment s inner join tbl_equipment ss on ss.id = s.equipment_id where s.appointment_id = $id") as $row) {
      $pdf->SetXY(13.5, $line);
      $pdf->Cell(50, 8, strtoupper($row['name']), 1, 1, 'C');
      $pdf->SetXY(63.5, $line);
      $pdf->Cell(25, 8, "SERVICE", 1, 1, 'C');
      $pdf->SetXY(88.5, $line);
      $pdf->Cell(25, 8, strtoupper($row['qty'] ?? 0), 1, 1, 'C');
      $pdf->SetXY(113.5, $line);
      $pdf->Cell(50, 8, number_format($row['price'], 2), 1, 1, 'R');
      $pdf->SetXY(163.5, $line);
      $pdf->Cell(40, 8, number_format($row['price'] * ($row['qty'] ?? 0), 2), 1, 1, 'R');
      $tmp_price += $row['price'] * ($row['qty'] ?? 0);
      $line += 8;
    }

    foreach (get_all("select s.*,m.price,m.name from tbl_appointment_medicine s inner join tbl_medicine_stock ms on ms.id = s.medicine_stock_id inner join tbl_medicine m on m.id = ms.medicine_id where s.appointment_id = $id order by m.id asc") as $row) {
      $pdf->SetXY(13.5, $line);
      $pdf->Cell(50, 8, strtoupper($row['name']), 1, 1, 'C');
      $pdf->SetXY(63.5, $line);
      $pdf->Cell(25, 8, "SERVICE", 1, 1, 'C');
      $pdf->SetXY(88.5, $line);
      $pdf->Cell(25, 8, strtoupper($row['qty'] ?? 0), 1, 1, 'C');
      $pdf->SetXY(113.5, $line);
      $pdf->Cell(50, 8, number_format($row['price'], 2), 1, 1, 'R');
      $pdf->SetXY(163.5, $line);
      $pdf->Cell(40, 8, number_format($row['price'] * ($row['qty'] ?? 0), 2), 1, 1, 'R');
      $tmp_price += $row['price'] * ($row['qty'] ?? 0);
      $line += 8;
    }

    $paid_data = get_one("select * from tbl_appointment_payment where appointment_id = $id");
    $pdf->SetXY(13.5, $line);
    $pdf->Cell(150, 8, "Discounted (PWD,SENIOR)", 1, 1, 'L');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, ($paid_data->discount_flag ?? 0) ? 'Discounted' : 'N/A', 1, 1, 'C');
    $line += 8;
    $discount_price =  $tmp_price * ((100 - 5) / 100);
    $pdf->SetXY(13.5, $line);
    $pdf->Cell(150, 8, "Discounted 5%", 1, 1, 'L');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, ($paid_data->discount_flag ?? 0) ? $discount_price : 0.00, 1, 1, 'C');
    $line += 8;
    $pdf->SetXY(13.5, $line);
    $pdf->Cell(150, 8, "Subtotal", 1, 1, 'L');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, number_format($tmp_price, 2), 1, 1, 'C');
    $line += 8;
    $pdf->SetXY(13.5, $line);
    $pdf->Cell(150, 8, "Total", 1, 1, 'L');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, ($paid_data->discount_flag ?? 0) ? number_format($tmp_price - $discount_price, 2) : number_format($tmp_price, 2), 1, 1, 'C');
    $line += 8;
    $pdf->SetXY(13.5, $line);
    $pdf->Cell(150, 8, "Amount", 1, 1, 'L');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, (($paid_data->amount ?? 0) ? number_format($paid_data->amount, 2) : '0.00'), 1, 1, 'C');
    $line += 8;
    $pdf->SetXY(13.5, $line);
    $pdf->Cell(150, 8, "Change", 1, 1, 'L');
    $pdf->SetXY(163.5, $line);
    $pdf->Cell(40, 8, (($paid_data->change ?? 0) ? number_format($paid_data->change, 2) : '0.00'), 1, 1, 'C');
    $line += 8;
    break;

  default:
    break;
}
$pdf->Output();
