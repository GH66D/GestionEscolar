<?php
include('conexion.php');
$con = connection();

echo '<link href="fontello.css" type="text/css" rel="stylesheet">';
echo '<script src="https://code.jquery.com/jquery-3.6.3.min.js"> </script>';


$sql = "SELECT `examen`.`id_examen`, `salones`.`salon`, `horarios`.`hora_inicio`, `horarios`.`hora_fin`, `control_examen`.`disponibilidad`, `control_examen`.`asignados`
    FROM `examen` 
        LEFT JOIN `salones` ON `examen`.`id_salon` = `salones`.`id_salon` 
        LEFT JOIN `horarios` ON `examen`.`id_horario` = `horarios`.`id_horario` 
        LEFT JOIN `control_examen` ON `control_examen`.`id_examen` = `examen`.`id_examen`;";
$query = mysqli_query($con, $sql);


$sql2 = "SELECT `salones`.* FROM `salones`;";
$query2 = mysqli_query($con, $sql2);

$sql3 = "SELECT `horarios`.* FROM `horarios`;";
$query3 = mysqli_query($con, $sql3);

$sql4 = "SELECT boleta, nombre, ap_paterno, ap_materno, genero, curp, colonia, alcaldia, telefono, correo, entidad, promedio, id_examen FROM alumno;";
$query4 = mysqli_query($con, $sql4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Administrador</h1>
        <h2>Alumnos registrados</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Boleta</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Genero</th>
                        <th>CURP</th>
                        <th>Colonia</th>
                        <th>Alcaldia</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Entidad</th>
                        <th>Promedio</th>
                        <th>Examen asignado</th>
                        <th>Eliminar alumno</th>
                        <th>
                            <center>Aplicar cambios</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query4)): ?>
                        <tr>
                            <form action="admin2.php" method="POST">
                                <th><input type="text" value="<?= $row['boleta'] ?>" name="BOL"></th>
                                <th><input type="text" value="<?= $row['nombre'] ?> " name="NOM"></th>
                                <th><input type="text" value="<?= $row['ap_paterno'] ?>" name="PAT"></th>
                                <th><input type="text" value="<?= $row['ap_materno'] ?>" name="MAT"></th>
                                <th><input type="text" value="<?= $row['genero'] ?>" name="GEN"></th>
                                <th><input type="text" value="<?= $row['curp'] ?>" name="CU"></th>
                                <th><input type="text" value="<?= $row['colonia'] ?>" name="COL"></th>
                                <th><input type="text" value="<?= $row['alcaldia'] ?>" name="ALC"></th>
                                <th><input type="text" value="<?= $row['telefono'] ?>" name="TEL"></th>
                                <th><input type="text" value="<?= $row['correo'] ?>" name="CORR"></th>
                                <th><input type="text" value="<?= $row['entidad'] ?>" name="ENT"></th>
                                <th><input type="text" value="<?= $row['promedio'] ?>" name="PROM"></th>
                                <th><input type="text" value="<?= $row['id_examen'] ?>" name="EXAM"></th>
                                <th><a href="administrador.php ?id1=<?php echo $row['boleta'] ?>"><center><button type="button">Eliminar</button></center></a></th>
                                <th><button type="submit" class="btn btn-primary">Modificar</button></th>
                            </form>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div><br>

        <div>
            <h2>Información de Examen</h2>
            <table border='2' height="120" width="50%">
                <thead>
                    <tr>
                        <th>Examen</th>
                        <th>Laboratorio</th>
                        <th>Hora de inicio</th>
                        <th>Hora de fin</th>
                        <th>Disponibilidad</th>
                        <th>Inc</th>
                        <th>Asignados</th>
                        <th>Dec</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <th><?= $row['id_examen'] ?></th>
                            <th>
                                <?= $row['salon'] ?>
                            </th>
                            <th><?= $row['hora_inicio'] ?></th>
                            <th>
                                <?= $row['hora_fin'] ?>
                            </th>
                            <th><?= $row['disponibilidad'] ?></th>
                            <th><a href="administrador.php ?id=<?php echo $row['id_examen'] ?>"> <button type="button">
                                        <span class="icon1 icon-up-big"> </span> </button> </a> </th>
                            <th>
                                <?= $row['asignados'] ?>
                            </th>
                            <th><a href="administrador.php ?id=<?php echo $row['id_examen'] ?>"> <button type="button">
                                        <span class="icon1 icon-down-big"> </span> </button> </a> </th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div><br>

        <h2> Registrar nuevo alumno </h2>
        <form action="admin.php" method="POST">
            <fieldset>
                <legend>IDENTIDAD</legend>
                <label for="boleta">N° boleta:</label>
                <input type="text" id="boleta" name="boleta"><br> <br>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"><br> <br>
                <label for="paterno">Apellido Paterno:</label>
                <input type="text" id="paterno" name="paterno"><br> <br>
                <label for="materno">Apellido Materno:</label>
                <input type="text" id="materno" name="materno"><br> <br>
                <label for="nacimiento">Fecha de nacimiento:</label>
                <input type="text" id="nacimiento" name="nacimiento"><br> <br>
                <label for="genero">Género:</label>
                <input type="radio" name="genero" id="gh" value="Hombre">Hombre
                <input type="radio" name="genero" id="gm" value="Mujer">Mujer<br> <br>
                <label for="dis">Tiene alguna discapacidad:</label>
                <input type="radio" name="dis" id="dissi" value="si">Si
                <input type="radio" name="dis" id="disno" value="no">No<br> <br>
                <label for="discapacidad">Que discapacidad tienes:</label>
                <input type="text" id="discapacidad" name="discapacidad"><br> <br>
                <label for="curp">CURP:</label>
                <input type="text" id="curp" name="curp"><br> <br>
            </fieldset>
            <fieldset>
                <legend>CONTACTO</legend>
                <label for="calle">Calle y Número:</label>
                <input type="text" id="calle" name="calle"><br> <br>
                <label for="colonia">Colonia:</label>
                <input type="text" id="colonia" name="colonia"><br> <br>
                <label for="alcaldia">Alcaldía:</label>
                <select id="alcaldia" name="alcaldia">
                    <option>Alvaro Obregón</option>
                    <option>Azcapotzalco</option>
                    <option>Coyoacán</option>
                    <option>Cuajimalpa</option>
                    <option>Gustavo A. Madero</option>
                    <option>Iztacalco</option>
                    <option>Iztapalapa</option>
                    <option>Magdalena Contreras</option>
                    <option>Milpa Alta</option>
                    <option>Tlahúac</option>
                    <option>Tlalpan</option>
                    <option>Xochimilco</option>
                    <option>Benito Juárez</option>
                    <option>Cuauhtémoc</option>
                    <option>Miguel Hidalgo</option>
                    <option>Venustiano Carranza</option>
                </select><br><br>
                <label for="cp">Código Postal:</label>
                <input type="text" id="cp" name="cp"><br> <br>
                <label for="tel">Teléfono o celular:</label>
                <input type="text" id="tel" name="tel"><br> <br>
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo"><br> <br>
            </fieldset>
            <fieldset>
                <legend>PROCEDENCIA</legend>
                <label for="procedencia">Escuela de procedencia:</label>
                <select name="escuela" id="procedencia">
                    <option>CECyT No. 1 Gonzalo Vázquez Vela</option>
                    <option>CECyT No. 10 Carlos Vallejo Márquez</option>
                    <option>CECyT No. 11 Wilfrido Massieu</option>
                    <option>CECyT No. 12 José María Morelos</option>
                    <option>CECyT No. 13 Ricardo Flores Magón</option>
                    <option>CECyT No. 14 Luis Enrique Erro</option>
                    <option>CECyT No. 15 Diódoro Antúnez Echegaray</option>
                    <option>CECyT No. 16 Hidalgo</option>
                    <option>CECyT No. 17 León, Guanajuato</option>
                    <option>CECyT No. 18 Zacatecas</option>
                    <option>CECyT No. 19 Leona Vicario</option>
                    <option>CECyT No. 2 Miguel Bernard</option>
                    <option>CECyT No. 3 Estanislao Ramírez Ruiz</option>
                    <option>CECyT No. 4 Lázaro Cárdenas</option>
                    <option>CECyT No. 5 Benito Juárez</option>
                    <option>CECyT No. 6 Miguel Othón de Mendizábal</option>
                    <option>CECyT No. 7 Cuauhtémoc</option>
                    <option>CECyT No. 8 Narciso Bassols</option>
                    <option>CECyT No. 9 Juan de Dios Bátiz</option>
                    <option>CET 1 Walter Cross Buchanan</option>
                    <option value="">-OTRO-</option>
                </select>
                <br> <br>
                <label for="nombreedo">Entidad federativa de procedencia:</label>
                <select name="estado" id="nombreedo">
                    <option>Aguascalientes</option>
                    <option>Baja California </option>
                    <option>Baja California Sur </option>
                    <option>Campeche </option>
                    <option>Chiapas </option>
                    <option>Chihuahua </option>
                    <option>Ciudad de México </option>
                    <option>Coahuila </option>
                    <option>Colima</option>
                    <option>Durango</option>
                    <option>Estado de México</option>
                    <option>Guanajuato</option>
                    <option>Guerrero</option>
                    <option>Hidalgo</option>
                    <option>Jalisco</option>
                    <option>Michoacán</option>
                    <option>Morelos</option>
                    <option>Nayarit</option>
                    <option>Nuevo León</option>
                    <option>Oaxaca</option>
                    <option>Puebla</option>
                    <option>Querétaro</option>
                    <option>Quintana Roo</option>
                    <option>San Luis Potosí</option>
                    <option>Sinaloa</option>
                    <option>Sonora</option>
                    <option>Tabasco</option>
                    <option>Tamaulipas</option>
                    <option>Tlaxcala</option>
                    <option>Veracruz</option>
                    <option>Yucatán</option>
                    <option>Zacatecas </option>
                </select>
                <br> <br>
                <label for="nombresc">Nombre de la escuela:</label>
                <input type="text" id="nombresc" name="nombresc"><br> <br>
                <label for="promedio">Promedio:</label>
                <input type="number" id="promedio" name="promedio"><br> <br>
                <label for="opcion">ESCOM fue tu:</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion1" value="1ra opcion"
                        checked>1ra opcion <br>
                    <label class="form-check-label" for="opcion1"></label>
                    <input class="form-check-input" type="radio" name="opcion" id="opcion2" value="2da opcion"
                        checked>2da opcion <br>
                    <label class="form-check-label" for="opcion2"></label>
                    <input class="form-check-input" type="radio" name="opcion" id="opcion3" value="3ra opcion"
                        checked>3ra opcion <br>
                    <label class="form-check-label" for="opcion3"></label>
                </div>
                <br>
                <label for="examen">Examen a asignar</label><br>
                <input type="text" id="examen" name="examen"><br><br>
            </fieldset>
            <button type="submit" class="btn btn-primary">Subir</button>
            <button type="reset" class="btn btn-primary">Limpiar</button>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>