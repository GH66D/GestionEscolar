<?php
    include("./phpMailer/class.phpmailer.php");
    include("./phpMailer/class.smtp.php");
    include('conexion.php');
    $con = connection();
    $boleta=$_POST['boleta'];
    $consulta4 = "SELECT * FROM alumno WHERE boleta='$boleta';";
$resultado4 = mysqli_query($con,$consulta4);

while($row4 = $resultado4->fetch_assoc()){
    $correo = $row4['correo'];
}
    $filename = './'$boleta.'.pdf';
    if(file_exists($filename)==true){
        $email_user = "prowebeq1@gmail.com";
        $email_password = "nmoxepfbijijgnnh";
        $the_subject = "Registro de Datos";
        $address_to = $correo;
        $from_name = "Equipo 1 Proyecto Final ESCOM";
        $phpmailer = new PHPMailer();

        // ---------- datos de la cuenta de Gmail -------------------------------
        $phpmailer->Username = $email_user;
        $phpmailer->Password = $email_password; 
        //-----------------------------------------------------------------------
        // $phpmailer->SMTPDebug = 1;
        $phpmailer->SMTPSecure = 'ssl';
        $phpmailer->Host = "smtp.gmail.com"; // GMail
        $phpmailer->Port = 465;
        $phpmailer->IsSMTP(); // use SMTP
        $phpmailer->SMTPAuth = true;
        $phpmailer->setFrom($phpmailer->Username,$from_name);
        $phpmailer->AddAddress($address_to); // recipients email
        $file=file_get_contents($filename);
        base64_encode($file);
        $phpmailer->addAttachment($file,$boleta.'.pdf');

        date_default_timezone_set('UTC'); //Universal Time Coordinated
        date_default_timezone_set("America/Mexico_City");

        $phpmailer->Subject = $the_subject;	
        $phpmailer->Body .="<h1 style='color:#00659A;'>Registro de Datos Generales para Alumnos de Nuevo Ingreso (febrero 2023)</h1>";
        $phpmailer->Body .= "<p>Tus datos se han registrado correctamente en el sistema.</p>";
        $phpmailer->Body .= "<p>Te enviamos tu pdf con los datos que has registrado y la información de tu examen.</p>";
        $phpmailer->Body .= "<p><b>Fecha: ".date("d-m-Y H:i:s")."</b></p>";
    
        $phpmailer->IsHTML(true);
        $phpmailer->Send();
    }
?>