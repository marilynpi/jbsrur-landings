<?php

$nombre = addslashes($_REQUEST['nombre']);
$asunto = addslashes($_REQUEST['asunto']);
$email = addslashes($_REQUEST['email']);
$telefono = addslashes($_REQUEST['telefono']);
$mensaje = addslashes($_REQUEST['mensaje']);

$dest = "marilyn.pirrello@gmail.com";

$headers = "X-Mailer: PHP5\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Jbsrur <info@jbsrur.com.ar>\r\n";

$asuntoEmail = "Consulta Jbsrur";
$cuerpo = "Nombre: ".$nombre."<br>";
$cuerpo .= "E-mail: ".$email."<br>";
$cuerpo .= "Teléfono: ".$telefono."<br>";
$cuerpo .= "Asunto: ".$asunto."<br>";
$cuerpo .= "Mensaje: ".$mensaje;

$success=false;
if($nombre != '' && $asunto != '' && $email != '' && $telefono != '' && $mensaje != ''){
   $success= mail($dest,$asuntoEmail,$cuerpo,$headers);
   mail('carmontanari@gmail.com',$asuntoEmail,$cuerpo,$headers);
}

echo json_encode(array('success'=>$success));
?>
