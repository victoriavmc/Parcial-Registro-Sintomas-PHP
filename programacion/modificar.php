<?php
include 'conexion.php';
$bd = conectarBD();

date_default_timezone_set('America/Argentina/Buenos_Aires');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = date("Y-m-d");
    $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : NULL;
    $tos = isset($_POST['tos']) ? $_POST['tos'] : NULL;
    $insufRespiratoria = isset($_POST['insufRespiratoria']) ? $_POST['insufRespiratoria'] : NULL;
    $dolorDeGarganta = isset($_POST['dolorDeGarganta']) ? $_POST['dolorDeGarganta'] : NULL;
    $perdidaDelOlfato = isset($_POST['perdidaDelOlfato']) ? $_POST['perdidaDelOlfato'] : NULL;
    $perdidaDelGusto = isset($_POST['perdidaDelGusto']) ? $_POST['perdidaDelGusto'] : NULL;
    $otrosSintomas = !empty($_POST['otrosSintomas']) ? $_POST['otrosSintomas'] : "Ninguno";
    $tuvoContactoAislamiento = isset($_POST['tuvoContactoAislamiento']) ? $_POST['tuvoContactoAislamiento'] : NULL;
    $tuvoContactoUltDias = isset($_POST['tuvoContactoUltDias']) ? $_POST['tuvoContactoUltDias'] : NULL;
    $lugarViaje = !empty($_POST['lugarViaje']) ? $_POST['lugarViaje'] : "Ninguno";
    $observaciones = !empty($_POST['observaciones']) ? $_POST['observaciones'] : "Ninguno";

    if ($id) {
        $sql = "UPDATE personal SET pers_nombre='$nombre', pers_apellido='$apellido', pers_fecha='$fecha', pers_hora=NOW(), pers_temperatura='$temperatura', pers_tos='$tos', pers_insuficienciaRespiratoria='$insufRespiratoria', pers_dolorDeGarganta='$dolorDeGarganta', pers_perdidaDelOlfato='$perdidaDelOlfato', pers_perdidaDelGusto='$perdidaDelGusto', pers_otrosSintomas='$otrosSintomas', pers_tuvoContactoAislamiento='$tuvoContactoAislamiento', pers_tuvoContactoUltDias='$tuvoContactoUltDias', pers_lugarViaje='$lugarViaje', pers_observaciones='$observaciones' WHERE pers_idpersonal='$id'";
        if (mysqli_query($bd, $sql)) {
            header('Location: index.php');
        } else {
            echo "<script>alert('No se pudo actualizar el registro.');</script>";
            echo '<script>window.location.href = "index.php";</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<?php
$template_path = './estilo/templates/head.php';
include $template_path; ?>

<body>
    <div class=cajaPrincipal>
        <div class=ladoIzq></div>
        <div class=mid>
            <div class=atras>
                <a href="./index.php"><img src="./estilo/img/atras.png" width="40" alt="volver"></a>
            </div>
            <h1><span>Modificar Registro del Personal</span></h1>
            <p style="color: red;
            font-weight: bold;
            text-align: center;">ES OBLIGATORIO CUMPLIR CON EL PROTOCOLO DE INGRESO DEL PERSONAL TODO VEZ Y PARA TODO EL PERSONAL QUE INGRESE AL ESTABLECIMIENTO</p>
            <p> Completar de sintomas segun corresponda: </p>
            <div class=busqueda>
                <form method="GET">
                    <label for="id">ID del Personal:</label>
                    <input type="number" id="id" name="id" placeholder="Ingrese ID del Personal" required>
                    <button type="submit">Buscar</button>
                </form>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $consulta = "SELECT * FROM personal WHERE pers_idpersonal = '$id'";
                    $resultado = mysqli_query($bd, $consulta);
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        $row = mysqli_fetch_assoc($resultado);
                ?>
                        <form class=principal method="post">
                            <div class="texto">
                                <label for="nombre">Nombre</label>
                                <input required name="nombre" class="form-input" type="text" id="nombre" value="<?php echo $row['pers_nombre']; ?>">

                                <label for="apellido">Apellido</label>
                                <input required name="apellido" class="form-input" type="text" id="apellido" value="<?php echo $row['pers_apellido']; ?>">

                                <label for="otrosSintomas">Otros Síntomas</label>
                                <input name="otrosSintomas" class="form-input" type="text" id="otrosSintomas" value="<?php echo $row['pers_otrosSintomas']; ?>">

                                <label for="lugarViaje">Viajes (Lugar)</label>
                                <input name="lugarViaje" class="form-input" type="text" id="lugarViaje" value="<?php echo $row['pers_lugarViaje']; ?>">

                                <label for="observaciones">Observaciones</label>
                                <textarea class="form-input" name="observaciones" id="observaciones" cols="20" rows="5"><?php echo $row['pers_observaciones']; ?></textarea>
                            </div>

                            <div class="check">
                                <label for="temperatura">Temperatura</label>
                                <div class="radio-button">
                                    <input required name="temperatura" type="radio" value="1" <?php echo ($row['pers_temperatura'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="temperatura" type="radio" value="0" <?php echo ($row['pers_temperatura'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="tos">Tos</label>
                                <div class="radio-button">
                                    <input required name="tos" type="radio" value="1" <?php echo ($row['pers_tos'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="tos" type="radio" value="0" <?php echo ($row['pers_tos'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="insufRespiratoria">Insuficiencia Respiratoria</label>
                                <div class="radio-button">
                                    <input required name="insufRespiratoria" type="radio" value="1" <?php echo ($row['pers_insuficienciaRespiratoria'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="insufRespiratoria" type="radio" value="0" <?php echo ($row['pers_insuficienciaRespiratoria'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="dolorDeGarganta">Dolor de Garganta</label>
                                <div class="radio-button">
                                    <input required name="dolorDeGarganta" type="radio" value="1" <?php echo ($row['pers_dolorDeGarganta'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="dolorDeGarganta" type="radio" value="0" <?php echo ($row['pers_dolorDeGarganta'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="perdidaDelOlfato">Pérdida del Olfato</label>
                                <div class="radio-button">
                                    <input required name="perdidaDelOlfato" type="radio" value="1" <?php echo ($row['pers_perdidaDelOlfato'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="perdidaDelOlfato" type="radio" value="0" <?php echo ($row['pers_perdidaDelOlfato'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="perdidaDelGusto">Pérdida del Gusto</label>
                                <div class="radio-button">
                                    <input required name="perdidaDelGusto" type="radio" value="1" <?php echo ($row['pers_perdidaDelGusto'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="perdidaDelGusto" type="radio" value="0" <?php echo ($row['pers_perdidaDelGusto'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="tuvoContactoAislamiento">¿Estuvo en contacto con alguien en aislamiento?</label>
                                <div class="radio-button">
                                    <input required name="tuvoContactoAislamiento" type="radio" value="1" <?php echo ($row['pers_tuvoContactoAislamiento'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="tuvoContactoAislamiento" type="radio" value="0" <?php echo ($row['pers_tuvoContactoAislamiento'] == '0') ? 'checked' : ''; ?>> NO
                                </div>

                                <label for="tuvoContactoUltDias">¿Estuvo en contacto con alguien que viajó en los últimos días?</label>
                                <div class="radio-button">
                                    <input required name="tuvoContactoUltDias" type="radio" value="1" <?php echo ($row['pers_tuvoContactoUltDias'] == '1') ? 'checked' : ''; ?>> SI
                                    <input required name="tuvoContactoUltDias" type="radio" value="0" <?php echo ($row['pers_tuvoContactoUltDias'] == '0') ? 'checked' : ''; ?>> NO
                                </div>
                            </div>
                            <div class="boton">
                                <button type="submit">Modificar</button>
                            </div>
                        </form>
                <?php
                    } else {
                        echo "<script>alert('No se encontró ningún registro con el ID proporcionado. Revisa los ID Existentes');</script>";
                        echo '<script>window.location.href = "buscar.php";</script>';
                    }
                }
                ?>
            </div>

        </div>
        <div class=ladoDere></div>

    </div>
</body>
<!-- FOOTER-->
<?php
$template_path = './estilo/templates/footer.php';
include $template_path; ?>

</html>