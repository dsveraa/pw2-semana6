<?php
ini_set('display_errors', 1);
$servername = "localhost";
$database = "agencia";
$username = "david";
$password = "12345";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
die("Fallo de conexión: " . mysqli_connect_error());
}
/* echo "Conexión exitosa"; */
