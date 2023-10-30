<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("select * from vuelo where id = ?;");
    $sentencia->execute([$codigo]);
    $vuelo = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Origen: </label>
                        <input type="text" class="form-control" name="txtOrigen" required 
                        value="<?php echo $vuelo->origen; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Destino: </label>
                        <input type="text" class="form-control" name="txtDestino" autofocus required
                        value="<?php echo $vuelo->destino; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha del Vuelo: </label>
                        <input type="date" class="form-control" name="txtFechaVuelo" autofocus required
                        value="<?php echo $vuelo->fecha_vuelo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora del Vuelo: </label>
                        <input type="time" class="form-control" name="txtHoraVuelo" autofocus required
                        value="<?php echo $vuelo->hora_vuelo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio del Vuelo: </label>
                        <input type="number" class="form-control" name="txtPrecioVuelo" autofocus required
                        value="<?php echo $vuelo->precio_vuelo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad de Pasajeros: </label>
                        <input type="number" class="form-control" name="txtCantidadPasajeros" autofocus required
                        value="<?php echo $vuelo->cantidad_pasajeros; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $vuelo->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include 'template/footer.php' ?>