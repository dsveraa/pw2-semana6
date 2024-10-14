<!DOCTYPE html>
<html lang="en">
<?php require 'head.php' ?>
<body>
    <div class="container">
        <h1 class="my-5">Ingresar datos del vuelo</h1>
        <form id="flightForm" action="add_flight.php" method="post">
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="origin">Origen</label>
                    <input class="form-control" type="text" name="origin" id="origin" placeholder="">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="destination">Destino</label>
                    <input class="form-control" type="text" name="destination" id="destination" placeholder="">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="date">Fecha</label>
                    <input class="form-control" type="date" name="date" id="date" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="available">Plazas disponibles</label>
                    <input class="form-control" type="number" name="available" id="available" placeholder="">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="rate">Precio</label>
                    <input class="form-control" type="number" name="rate" id="rate" placeholder="">
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Agregar</button>
        </form>
        <div class="my-4 text-success">
        <?php
            if (isset($_GET['added'])) {
                echo 'El vuelo ha sido añadido';
            }
            ?>
        </div>
    </div>

    
</body>
<script src="validation_flight.js"></script>
</html>
