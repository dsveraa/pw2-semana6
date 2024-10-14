<!DOCTYPE html>
<html lang="en">
<?php require 'head.php' ?>
<body>
    <div class="container">
        <h1 class="my-5">Ingresar datos del hotel</h1>
        <form id="hotelForm" action="add_hotel.php" method="post">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="name">Nombre</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="location">Ubicación</label>
                    <input class="form-control" type="text" name="location" id="location" placeholder="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="rooms">Habitaciones</label>
                    <input class="form-control" type="number" name="rooms" id="rooms" placeholder="">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="rate">Tarifa por noche</label>
                    <input class="form-control" type="number" name="rate" id="rate" placeholder="">
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Agregar</button>
        </form>
        <div class="my-4 text-success">
        <?php
            if (isset($_GET['added'])) {
                echo 'El hotel ha sido añadido';
            }
            ?>
        </div>
    </div>
</body>
<script src="validation_hotel.js"></script>
</html>
