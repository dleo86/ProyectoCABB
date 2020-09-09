<?php
if($_POST['btnEnviar']) {
    $nombre = "";
    $email = "";
    $consulta = "";
     
    if(isset($_POST['nombre'])) {
      $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['consulta'])) {
        $consulta = htmlspecialchars($_POST['consulta']);
    }
    
    $recipient = "dleo86@gmail.com";
    
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($recipient, $headers, $consulta )) {
        echo "<p>Gracias por contactarnos. Nos comunicaremos con usted a la brevedad.</p>";
        header("refresh:3;url=../index.php");
    } else {
        echo '<p>El mensaje no pudo ser enviado 1.</p>';
        header("refresh:3;url=../index.php");
    }
     
} else {
    echo '<p>El mensaje no pudo ser enviado 2</p>';
    header("refresh:3;url=../index.php");
}
?>