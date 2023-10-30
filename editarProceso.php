<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $origen = $_POST['txtOrigen'];
    $destino = $_POST['txtDestino'];
    $fecha_vuelo = $_POST['txtFechaVuelo'];
    $hora_vuelo = $_POST['txtHoraVuelo'];
    $precio_vuelo = $_POST['txtPrecioVuelo'];
    $cantidad_pasajeros = $_POST['txtCantidadPasajeros'];

    $sentencia = $bd->prepare("UPDATE vuelo SET origen = ?, destino = ?, fecha_vuelo = ?,hora_vuelo = ?,precio_vuelo = ?,cantidad_pasajeros = ? where id = ?;");
    $resultado = $sentencia->execute([$origen, $destino, $fecha_vuelo, $hora_vuelo, $precio_vuelo, $cantidad_pasajeros,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
