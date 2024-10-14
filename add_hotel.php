<?php
require 'connection.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $rooms = $_POST['rooms'];
    $rate = $_POST['rate'];
}

$sql = "INSERT INTO hotel (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES ('$name', '$location', '$rooms', '$rate')";
if ($conn->query($sql)===TRUE) {
    header('Location: add_hotel_form.php?added');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
