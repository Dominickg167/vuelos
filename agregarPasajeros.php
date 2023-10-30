<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from vuelo where id = ?;");
$sentencia->execute([$codigo]);
$vuelo = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_promocion = $bd->prepare("select * from pasajeros where id_pasajero = ?;");
$sentencia_promocion->execute([$codigo]);
$pasajero = $sentencia_promocion->fetchAll(PDO::FETCH_OBJ); 
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar los datos de los pasajeros : <br><?php echo $vuelo->origen.' --> '.$vuelo->destino.' // '.$vuelo->fecha_vuelo; ?>
                </div>
                <form class="p-4" method="POST" action="registrarPasajeros.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="txtCelular" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">numero_asientos: </label>
                        <input type="text" class="form-control" name="txtNumeroAsientos" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $vuelo->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        <br>
                        <a href="lista_vuelos.php" class="btn btn-primary">Ver Lista de Vuelos</a><br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Pasajeros
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Celular</th>
                                <th scope="col">N.Asientos</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pasajero as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->apellido; ?></td>
                                    <td><?php echo $dato->celular; ?></td>
                                    <td><?php echo $dato->numero_asientos; ?></td>
                                    <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar_pasajeros.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>