<?php


/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebaproyecto";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Algo ha ido mal: " . mysqli_connect_error());

if (mysqli_connect_errno()) {
printf("Conexión fallida: %s\n", mysqli_connect_error());
exit();
}


?>