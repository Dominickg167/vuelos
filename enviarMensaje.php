<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.nombre, pro.apellido, pro.celular, pro.numero_asientos, pro.id_pasajero, per.origen, per.destino, per.fecha_vuelo, per.hora_vuelo, per.precio_vuelo, per.cantidad_pasajeros
  FROM pasajeros pro 
  INNER JOIN vuelo per ON per.id = pro.id_pasajero
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$vuelo = $sentencia->fetch(PDO::FETCH_OBJ);

            $url = 'https://api.greenapi.com/waInstance7103864963/sendMessage/17d64ea92e8e46f8bddafa1de8b01d8906a3d14f2f834d2198';

            //chatId is the number to send the message to (@c.us for private chats, @g.us for group chats)
            $data = array(
                'chatId' => '51947858967@c.us',
                'message' => 'Estimado(a) señor(a), gracias por estar en nuestro vuelo '.strtoupper($vuelo->origen).' --> '.strtoupper($vuelo->destino).'');
            
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => json_encode($data)
                )
            );
            
            $context = stream_context_create($options);
            
            $response = file_get_contents($url, false, $context);
            
            echo $response;
    header('Location: agregarPasajeros.php?codigo='.$vuelo->id_pasajero);
?> 