<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = 1;
    $id_vuelo = $_POST['id_vuelo'];
    $id_hotel = $_POST['id_hotel'];
    $fecha_reserva = $_POST['fecha_reserva'];

    $stmt = $conn->prepare("INSERT INTO reserva (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

    if ($stmt->execute()) {
        header('Location: add_reservation_form.php?reserve=ok');
    } 

    $stmt->close();
}

mysqli_close($conn);
?>
