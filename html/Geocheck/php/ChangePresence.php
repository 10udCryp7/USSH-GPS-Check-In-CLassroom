<?php
session_start();

$attendanceID = $_GET['id'];
$stuID = $_GET['stuID'];

//Database Information
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$port = 3306;
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

$query = "CALL modifyAttendance($attendanceID, $stuID)";

if (mysqli_real_query($conn, $query)){
    header ("Location: ../View-Attendance-P.php?id=".$attendanceID);
} else {
    echo
    "<script>
window.confirm(\"Something went wrong\");
</script>";
}


