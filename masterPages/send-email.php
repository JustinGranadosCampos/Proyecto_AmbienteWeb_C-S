<?php
    if(isset($_POST['enivar'])){
        $correo = $_POST['Correo'];

        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer();
        $mail -> CharSet = 'UTF-8';

        $body = 'Hola';

        $mail -> IsSMTP();
        $mail -> Host = 'smtp.office365.com'; 
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587; 
        $mail -> SMTPAuth = true;
        $mail -> Username = 'QRVLABInventory@outlook.com';
        $mail -> Password = 'AmbienteClienteServidor';
        $mail -> SetFrom('QRVLABInventory@outlook.com', "QRVLABInventory");
        $mail -> Subject = 'Nosotros';
        $mail -> MsgHTML($body);
        $mail->AddAddress($correo, 'Cliente');
        $mail->send();
    
    }
?>