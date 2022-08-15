<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $name = mysqli_real_escape_string($con, $name);
        $rfid_code = stripslashes($_REQUEST['rfid_code']);
        $rfid_code = mysqli_real_escape_string($con, $rfid_code);
        $pin = stripslashes($_REQUEST['pin']);
        $pin = mysqli_real_escape_string($con, $pin);
        $sms_number = stripslashes($_REQUEST['sms_number']);
        $sms_number = mysqli_real_escape_string($con, $sms_number);
        $query    = "INSERT into `users` (name, rfid_code, pin, sms_number)
                     VALUES ('$name', '$rfid_code', '$pin', '$sms_number')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Employee Name" required />
        <input type="text" class="login-input" name="rfid_code" placeholder="RFID number">
        <input type="password" class="login-input" name="pin" placeholder="Entry Pin">
        <input type="text" class="login-input" name="sms_number" placeholder="Phone Number">
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
