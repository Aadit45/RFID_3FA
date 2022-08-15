<?php
//we then check if the user has clicked the signup button
 if (isset ($_POST[ 'submit' ])) {

  //Then we include the database connection
  include _once 'db.php';
  //And we get the data from the signup form
  $name = $_POST['name'];
  $rfid_code = $_POST['rfid_code'];
  $pin = $_POST['pin'];
  $sms_number = $_POST['sms_number'];

  //Check 1f inputs are empty
  if (empty($name) || empty($rfid_code) || empty($pin) || empty($sms_number)) {
   header ("Location: registration.php?registration=empty");
   exit();
   } else {
    header ("Location: registration.php?registration=success")
    exit();
 }
}

