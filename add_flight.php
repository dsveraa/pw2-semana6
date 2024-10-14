<?php
require 'connection.php';

if (isset($_POST['add'])) {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $available = $_POST['available'];
    $rate = $_POST['rate'];
}

$sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES ('$origin', '$destination', '$date', '$available', '$rate')";
if ($conn->query($sql)===TRUE) {
    header('Location: add_flight_form.php?added');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
