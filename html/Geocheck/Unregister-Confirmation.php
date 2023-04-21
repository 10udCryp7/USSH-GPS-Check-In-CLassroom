<?php
session_start();
?>
<html>
  <head>
    <html lang="en"><head>
        <title>Geocheck</title>
        <meta name="author" content="Geocheck Team">
        <meta name="description" content="Login">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php
      include "./css/navbar.css";
      include "./css/UnregisterConfirmation.css";
      ?>
    </style>
  </head>
<body>
<?php
include "./html/navbarS.html";
include "./html/UnregisterConfirmation.html";
?>

<?php


$crn = $_GET['id'];
$stuID = $_SESSION['stuID'];

//Database Information
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$port = 3306;
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

$query = "CALL unregister($stuID, $crn)";

if (isset($_POST['unregisterConfirm'])) {
    if (mysqli_real_query($conn, $query)) {
        echo("<script LANGUAGE='JavaScript'>
                        window.alert('Unregistered from class successfully!');
                        window.location.href='./View-Classes-S.php';
                        </script>");
    } else {
        echo("<script LANGUAGE='JavaScript'>
                        window.alert('Error: returning to classes.');
                        window.location.href='./View-Classes-S.php';
                        </script>");
    }
}

?>

</body>
</html>
