<?php
//llamando los campos 

$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$telefone= $_POST["telefone"];
$mensaje= $_POST["mensaje"];

/// datos para el  corro 
$destino="rcastrob1992@hotmail.com";
$asunto=" contacto desde la web";

$contenido ="Nombre" . $Nombre . "\nCorreo:" . $correo . "\nTelefono:" . $telefono . "\nMensaje:" . $mensaje;

///////Enviando mensaje
mail($destino,"Contacto", $asunto, $contenido);
header('Location:mensaje-de-envio.html')

?>
