<?php
include('conexion.php');
session_start();

$con = connection();

$boleta = $_POST['boleta'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$nacimiento = $_POST['nacimiento'];
$genero = $_POST['genero'];
$discapacidad = $_POST['discapacidad'];
$curp = $_POST['curp'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$alcaldia = $_POST['alcaldia'];
$cp = $_POST['cp'];
$tel = $_POST['tel'];
$correo = $_POST['correo'];
$escuela = $_POST['escuela'];
$estado = $_POST['estado'];
$nombresc = $_POST['nombresc'];
$promedio = $_POST['promedio'];
$opcion = $_POST['opcion'];

$sql = "SELECT `id_examen` FROM `control_examen` WHERE disponibilidad != 0 ORDER BY  RAND();";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
$examen = $row['id_examen'];


$sql1 = "INSERT INTO alumno VALUES('$boleta', '$nombre', '$paterno', '$materno', '$nacimiento', '$genero', '$discapacidad', '$curp', '$calle', '$colonia', '$alcaldia', '$cp', '$tel', '$correo', '$escuela', '$estado', '$nombresc', '$promedio', '$opcion', '$examen');";
$query1 = mysqli_query($con, $sql1);

$sql2 = "UPDATE control_examen SET disponibilidad = (disponibilidad - 1) , asignados = (asignados + 1) WHERE id_examen = '$examen';";
$query2 = mysqli_query($con,$sql2);

if($query1){
    $_SESSION["boleta"]=$_POST['boleta'];
    header("location: GenerarPDF.php");
}
?>