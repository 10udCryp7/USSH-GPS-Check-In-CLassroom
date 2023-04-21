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
      include "./css/DeleteConfirmation.css";
      ?>
    </style>
  </head>
<body>
<?php
include "./html/navbarP.html";
include "./html/DeleteConfirmation.html";
?>

<?php


$crn = $_GET['id'];

//Database Information
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$port = 3306;
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

$query = "CALL deleteClass($crn)";


if (isset($_POST['deleteConfirm'])) {
    if (mysqli_real_query($conn, $query)) {
        echo("<script LANGUAGE='JavaScript'>
                        window.alert('Class deleted successfully!');
                        window.location.href='./View-Classes-P-Updated.php';
                        </script>");
    } else {
        echo("<script LANGUAGE='JavaScript'>
                        window.alert('Error: Returning to classes.');
                        window.location.href='./View-Classes-P-Updated.php';
                        </script>");
    }
} else if (isset($_POST['deleteCancel'])){
    header("Location: ./View-Classes-P-Updated.php");
}

?>
</body>
</html>
