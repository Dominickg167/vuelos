<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from vuelo");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);/////
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <?php include 'mensajes/mensajes.php' ?>
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">F.Vuelo</th>
                                <th scope="col">H.Vuelo</th>
                                <th scope="col">Precio del Vuelo</th>
                                <th scope="col">C.Pasajeros</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($persona as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->origen; ?></td>
                                    <td><?php echo $dato->destino; ?></td>
                                    <td><?php echo $dato->fecha_vuelo; ?></td>
                                    <td><?php echo $dato->hora_vuelo; ?></td>
                                    <td><?php echo $dato->precio_vuelo; ?></td>
                                    <td><?php echo $dato->cantidad_pasajeros; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-primary" href="agregarPasajeros.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <br><a href="index.php" class="btn btn-primary">Volver al registro de vuelos</a><br>
        </div>
<?php include 'template/footer.php' ?>