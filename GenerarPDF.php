<?php
    session_start();
    include('conexion.php');
    $con = connection();
    
    require('fpdf/fpdf.php');

    $boleta=$_SESSION["boleta"];

    class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('recursos/logoIPN.png',10,10,18);
    // Arial bold 15
    $this->SetFont('Times','B',15);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,7,utf8_decode('Instituto Politécnico Nacional'),0,1,'C',);
    $this->Cell(55);
    $this->Cell(80,7,utf8_decode('Escuela Súperior de Cómputo'),0,1,'C',);
    $this->Ln(5);
    $this->Cell(55);
    $this->SetFont('Times','B',17);
    $this->SetTextColor(0, 101, 154);
    $this->Cell(80,7,utf8_decode('Registro de Datos Generales para'),0,1,'C',);
    $this->Cell(55);
    $this->Cell(80,5,utf8_decode('Alumnos de Nuevo Ingreso (febrero 2023)'),0,0,'C',);
    //Segunda imagen
    $this->Image('recursos/logoESCOM.png',170,12,30);
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->SetTitle($boleta.'.pdf');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->SetFillColor(0, 101, 154);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(190,10,utf8_decode('Datos del alumno'),0,1,'C',true);
$pdf->SetTextColor(0,0,0);
    
$consulta = "SELECT * FROM alumno WHERE boleta='$boleta';";
$resultado = mysqli_query($con,$consulta);

while($row = $resultado->fetch_assoc()){
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(45,9,utf8_decode('Número de boleta:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(40,9,$row['boleta'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(30,9,utf8_decode('Nombre(s):'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['nombre'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(45,9,utf8_decode('Apellido paterno:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,utf8_decode($row['ap_paterno']),0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(45,9,utf8_decode('Apellido materno:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,utf8_decode($row['ap_materno']),0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(50,9,utf8_decode('Fecha de nacimiento:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['f_nacimiento'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(25,9,utf8_decode('Género:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['genero'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    if($row['discapacidad']!=null){
        $pdf->Cell(45,9,utf8_decode('Discapacidad:'),0,0,'L',0);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(90,9,$row['discapacidad'],0,1,'L',0);
        $pdf->SetFont('Times','B',14);
    }
    $pdf->Cell(20,9,utf8_decode('CURP:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['curp'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(43,9,utf8_decode('Número de calle:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['calle_num'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(24,9,utf8_decode('Colonia:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['colonia'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(25,9,utf8_decode('Alcaldia:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['alcaldia'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(37,9,utf8_decode('Código postal:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['codigo_post'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(26,9,utf8_decode('Teléfono:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['telefono'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(47,9,utf8_decode('Correo electrónico:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['correo'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    if($row['escuela_proc']!=null){
        $pdf->Cell(57,9,utf8_decode('Escuela de procedencia:'),0,0,'L',0);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(90,9,$row['escuela_proc'],0,1,'L',0);
        $pdf->SetFont('Times','B',14);
    }else{
        $pdf->Cell(50,9,utf8_decode('Nombre de la escuela:'),0,0,'L',0);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(90,9,$row['nombre_escuela'],0,1,'L',0);
        $pdf->SetFont('Times','B',14);
    }
    $pdf->Cell(24,9,utf8_decode('Entidad:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['entidad'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(28,9,utf8_decode('Promedio:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['promedio'],0,1,'L',0);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(40,9,utf8_decode('ESCOM fue tu:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(90,9,$row['escom_opcion'],0,1,'L',0);
}

$pdf->SetFillColor(107, 23, 64);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Times','B',16);
$pdf->Cell(190,10,utf8_decode('Salón y horario de examen'),0,1,'C',true);
$pdf->SetTextColor(0,0,0);

$consulta2 = "SELECT * FROM alumno INNER JOIN examen ON alumno.id_examen = examen.id_examen INNER JOIN salones ON examen.id_salon = salones.id_salon WHERE boleta='$boleta';";
$resultado2 = mysqli_query($con,$consulta2);

while($row2 = $resultado2->fetch_assoc()){
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(25,9,utf8_decode('Salón:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(15,9,$row2['salon'],0,1,'C',0);
}

$consulta3 = "SELECT * FROM alumno INNER JOIN examen ON alumno.id_examen = examen.id_examen INNER JOIN horarios ON examen.id_horario = horarios.id_horario WHERE boleta='$boleta';";
$resultado3 = mysqli_query($con,$consulta3);

while($row3 = $resultado3->fetch_assoc()){
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(25,9,utf8_decode('Horario:'),0,0,'L',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(15,9,$row3['hora_inicio'],0,0,'C',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(5,9,utf8_decode('-'),0,0,'C',0);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(15,9,$row3['hora_fin'],0,1,'C',0);
}

$consulta4 = "SELECT * FROM alumno WHERE boleta='$boleta';";
$resultado4 = mysqli_query($con,$consulta4);

while($row4 = $resultado4->fetch_assoc()){
    $correo = $row4['correo'];
}

$pdf->Output();
$pdf->Output('F','\pdfRecuperados/'.$boleta.'.pdf');
$file=$pdf->Output('S');
    include("./phpMailer/class.phpmailer.php");
    include("./phpMailer/class.smtp.php");


    $email_user = "prowebeq1@gmail.com";
    $email_password = "nmoxepfbijijgnnh";
    $the_subject = "Registro de Datos";
    $address_to = $correo;
    $from_name = "Equipo 1 Proyecto Final ESCOM";
    $phpmailer = new PHPMailer(true);

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
    $phpmailer->addStringAttachment($file,$boleta.'.pdf');

    date_default_timezone_set('UTC'); //Universal Time Coordinated
    date_default_timezone_set("America/Mexico_City");

    $phpmailer->Subject = $the_subject;	
    $phpmailer->Body .="<h1 style='color:#00659A;'>Registro de Datos Generales para Alumnos de Nuevo Ingreso (febrero 2023)</h1>";
    $phpmailer->Body .= "<p>Tus datos se han registrado correctamente en el sistema.</p>";
    $phpmailer->Body .= "<p>Te enviamos tu pdf con los datos que has registrado y la información de tu examen.</p>";
    $phpmailer->Body .= "<p><b>Fecha: ".date("d-m-Y H:i:s")."</b></p>";
    
    $phpmailer->IsHTML(true);
    $phpmailer->Send();
    
?>