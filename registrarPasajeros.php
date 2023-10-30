<?php
//print_r($_POST);
if (empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtCelular"]) || empty($_POST["txtNumeroAsientos"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$celular = $_POST["txtCelular"];
$numero_asientos = $_POST["txtNumeroAsientos"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO pasajeros(nombre,apellido,celular,numero_asientos,id_pasajero) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nombre,$apellido, $celular, $numero_asientos, $codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarPasajeros.php?codigo='.$codigo);
} 
