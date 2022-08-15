<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Access ID</th>
<th>RFID Number</th>
<th>RFID Sanned Datetime</th>
<th>RFID Granted</th>
<th>Pin Entered</th>
<th>Pin Entered Datetime</th>
<th>Pin Granted</th>
<th>Mobile Number</th>
<th>SMS Code Entered</th>
<th>SMS Code Entered Datetime</th>
<th>Entry Granted</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "beast", "12345", "door_lock");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT access_id, rfid_presented, rfid_presented_datetime, rfid_granted, pin_entered, 	pin_entered_datetime, pin_granted, mobile_number, 	smscode_entered, smscode_entered_datetime, smscode_granted FROM access_log"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["access_id"]. "</td><td>" . $row["rfid_presented"] . "</td><td>"
. $row["rfid_presented_datetime"]. "</td><td>" . $row["rfid_granted"] . "</td><td>" . $row["pin_entered"] . "</td><td>" . $row["pin_entered_datetime"] . "</td><td>" . $row["pin_granted"] . "</td><td>" . $row["mobile_number"] . "</td><td>" . $row["smscode_entered"] . "</td><td>" . $row["smscode_entered_datetime"] . "</td><td>" . $row["smscode_granted"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>