<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'connection.php';
?>
<body>
    <div class="container">
        <h1 class="my-5">Buscar servicio turístico</h1>
        <form id="reservationForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="origin">Origen</label>
                    <select class="form-select" name="origin" id="origin" required>
                        <option value="" disabled selected>Selecciona una ciudad</option>
                        <option value="Santiago">Santiago</option>
                        <option value="Lima">Lima</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Miami">Miami</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="destination">Destino</label>
                    <select class="form-select" name="destination" id="destination" required>
                        <option value="" disabled selected>Selecciona una ciudad</option>
                        <option value="Santiago">Santiago</option>
                        <option value="Lima">Lima</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Miami">Miami</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="travel_date">Fecha de viaje</label>
                    <input type="date" class="form-control" name="travel_date" id="travel_date" required>
                </div>
            </div>
            <button type="submit" name="search" class="btn btn-primary">Buscar</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['search'])) {
                $origin = $_POST['origin'];
                $destination = $_POST['destination'];
                $travel_date = $_POST['travel_date'];
    
                $stmt = $conn->prepare("SELECT * FROM vuelo WHERE origen=? AND destino=? AND fecha=?");
                $stmt->bind_param("sss", $origin, $destination, $travel_date);
                $stmt->execute();
    
                $result = $stmt->get_result();
    
                
                if ($row_flight = $result->fetch_assoc()) {
                    echo "<div class='mt-4'>";
                    echo "<h3>Resultados de la búsqueda</h3>";
                    echo "<b>Vuelo:</b> " . $row_flight["origen"] . " - " . $row_flight["destino"] . "<br><b>Fecha:</b> " . $row_flight["fecha"] . "<br><b>Asientos disponibles:</b> " . $row_flight["plazas_disponibles"] . "<br><b>Tarifa:</b> $" . $row_flight["precio"] . "<br>";
                    
    
                    $stmt = $conn->prepare("SELECT * FROM hotel WHERE ubicacion=?");
                    $stmt->bind_param("s", $destination);
                    $stmt->execute();
                    $result = $stmt->get_result();
    
                    if ($row_hotel = $result->fetch_assoc()) {
                        echo "<b>Hotel:</b> " . $row_hotel['nombre'] . "<br><b> Noche:</b> $" . $row_hotel['tarifa_noche'] . "<br>";
                        echo '<form action="add_reservation.php" method="post">';
                        echo '  <input type="hidden" name="id_vuelo" value="' . $row_flight["id_vuelo"] . '">';
                        echo '  <input type="hidden" name="id_hotel" value="' . $row_hotel['id_hotel'] . '">';
                        echo '  <input type="hidden" name="fecha_reserva" value="' . date("Y-m-d") . '">';
                        echo '  <button type="submit" class="btn btn-success mt-3">Reservar</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo "<br>No se encontraron coincidencias";
                }
                
                $stmt->close();
            }
        }

        if (isset($_GET['reserve'])) {
            echo '<h4 class="text-success mt-4">Se ha realizado la reserva.</h4>';
        }

        $query = "
                    SELECT h.nombre, h.ubicacion, COUNT(r.id_reserva) AS num_reservas
                    FROM hotel h
                    JOIN reserva r ON h.id_hotel = r.id_hotel
                    GROUP BY h.id_hotel
                    HAVING num_reservas > 2
                ";

                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    echo "<h2 class='mt-4'>Hoteles con más reservas:</h2>";
                    echo "<table class='table'>";
                    echo "<thead><tr><th>Hotel</th><th>Ubicación</th><th>Número de Reservas</th></tr></thead>";
                    echo "<tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['ubicacion'] . "</td>";
                        echo "<td>" . $row['num_reservas'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "No hay hoteles con más de dos reservas.";
                }
        mysqli_close($conn);
        ?>
    </div>
</body>
<script src="./script.js"></script>
</html>
