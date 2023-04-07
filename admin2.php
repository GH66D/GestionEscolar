<?php

include('conexion.php');

$con = connection();
$idBol = $_POST["BOL"];
$Cnom = $_POST["NOM"];
$Cpat = $_POST["PAT"];
$Cmat = $_POST["MAT"];
$Cgen = $_POST["GEN"];
$Ccu = $_POST["CU"];
$Ccol = $_POST["COL"];
$Calc = $_POST["ALC"];
$Ctel = $_POST["TEL"];
$Ccorr = $_POST["CORR"];
$Cent = $_POST["ENT"];
$Cprom= $_POST["PROM"];
$Cexam= $_POST["EXAM"];


$sql = "UPDATE alumno SET nombre = '$Cnom', ap_paterno = '$Cpat', ap_materno = '$Cmat', genero = '$Cgen', curp = '$Ccu', colonia = '$Ccol', alcaldia = '$Calc', telefono = '$Ctel', correo = '$Ccorr', entidad = '$Cent', promedio = '$Cprom', id_examen = '$Cexam' WHERE boleta = '$idBol';";
        $query = mysqli_query($con,$sql);

$sql2 = "UPDATE control_examen SET disponibilidad = (disponibilidad - 1) , asignados = (asignados + 1) WHERE id_examen = '$Cexam';";
        $query2 = mysqli_query($con,$sql2);

Header("Location: MainAdmin.php");

?>