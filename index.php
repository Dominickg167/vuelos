<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from vuelo");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>
<br>
    <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="registrar.php">
                            <div class="mb-3">
                                <label class="form-label">Origen: </label>
                                <input type="text" class="form-control" name="txtOrigen" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Destino: </label>
                                <input type="text" class=" form-control" name="txtDestino" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de Vuelo: </label>
                                <input type="date" class="form-control" name="txtFechaVuelo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hora de Vuelo</label>
                                <input type="time" class="form-control" name="txtHoraVuelo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Precio del Vuelo: </label>
                                <input type="text" class="form-control" name="txtPrecioVuelo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cantidad de Pasajeros: </label>
                                <input type="number" class="form-control" name="txtCantidadPasajeros" autofocus required>
                            </div>
                            <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                    <br>
                    <a href="lista_vuelos.php" class="btn btn-primary">Ver Lista de Vuelos</a>
                    <br>
                </form>
            </div>
        </div>
    <br>
<br>
<?php include 'template/footer.php' ?>