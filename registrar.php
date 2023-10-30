<?php
//print_r($_POST);
if (empty($_POST["oculto"])  || empty($_POST["txtOrigen"]) || empty($_POST["txtDestino"]) || empty($_POST["txtFechaVuelo"]) || empty($_POST["txtHoraVuelo"]) || empty($_POST["txtPrecioVuelo"]) || empty($_POST["txtCantidadPasajeros"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$origen = $_POST["txtOrigen"];
$destino = $_POST["txtDestino"];
$fecha_vuelo = $_POST["txtFechaVuelo"];
$hora_vuelo = $_POST["txtHoraVuelo"];
$precio_vuelo = $_POST["txtPrecioVuelo"];
$cantidad_pasajeros = $_POST["txtCantidadPasajeros"];

$sentencia = $bd->prepare("INSERT INTO vuelo(origen,destino,fecha_vuelo,hora_vuelo,precio_vuelo,cantidad_pasajeros) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$origen, $destino, $fecha_vuelo, $hora_vuelo, $precio_vuelo, $cantidad_pasajeros]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
