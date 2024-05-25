<?php include 'conexion.php';
$bd = conectarBD();

#SIRVE PARA PONER FECHA y NOW() ES PARA LA HORA ACTUAL:
date_default_timezone_set('America/Argentina/Buenos_Aires');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $sql = "INSERT INTO personal (pers_nombre, pers_apellido,pers_fecha,pers_hora, pers_temperatura, pers_tos, pers_insuficienciaRespiratoria, pers_dolorDeGarganta, pers_perdidaDelOlfato, pers_perdidaDelGusto, pers_otrosSintomas, pers_tuvoContactoAislamiento, pers_tuvoContactoUltDias, pers_lugarViaje, pers_observaciones)
    VALUES ('$nombre', '$apellido', '$fecha', NOW(), '$temperatura', '$tos', '$insufRespiratoria', '$dolorDeGarganta', '$perdidaDelOlfato', '$perdidaDelGusto', '$otrosSintomas', '$tuvoContactoAislamiento', '$tuvoContactoUltDias', '$lugarViaje', '$observaciones')";

    if ($bd->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "" . $bd->error;
    }
}
?>

<!DOCTYPE html>
<?php
$template_path = 'estilo/Templates/head.php';
include $template_path; ?>

<body>
    <div class=cajaPrincipal>
        <div class=ladoIzq></div>
        <div class=mid>
            <div class=atras>
                <a href="./index.php"><img src="./estilo/img/atras.png" width="40" alt="volver"></a>
            </div>
            <h1><span>Crear Nuevo Registro de Personal</span></h1>
            <p style="color: red;
            font-weight: bold;
            text-align: center;">
                ES OBLIGATORIO CUMPLIR CON EL PROTOCOLO DE INGRESO DEL PERSONAL TODO VEZ Y PARA TODO EL PERSONAL QUE INGRESE AL ESTABLECIMIENTO
            </p>

            <p> Completar de sintomas segun corresponda: </p>
            <form class=principal method="post">

                <div class="texto">
                    <label for="nombre">Nombre</label>
                    <input required name="nombre" type="text" id="nombre">

                    <label for="apellido">Apellido</label>
                    <input required name="apellido" type="text" id="apellido">

                    <label for="otrosSintomas">Otros Síntomas</label>
                    <input name="otrosSintomas" type="text" id="otrosSintomas">

                    <label for="lugarViaje">Viajes (Lugar)</label>
                    <input name="lugarViaje" type="text" id="lugarViaje">

                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" cols="20" rows="5"></textarea>
                </div>
                <div class="check">
                    <div class="radio-button">
                        <label for="temperatura">Temperatura</label>
                        <input required name="temperatura" type="radio" value="1"> SI
                        <input required name="temperatura" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="tos">Tos</label>
                        <input required name="tos" type="radio" value="1"> SI
                        <input required name="tos" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="insufRespiratoria">Insuficiencia Respiratoria</label>
                        <input required name="insufRespiratoria" type="radio" value="1"> SI
                        <input required name="insufRespiratoria" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="dolorDeGarganta">Dolor de Garganta</label>
                        <input required name="dolorDeGarganta" type="radio" value="1"> SI
                        <input required name="dolorDeGarganta" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="perdidaDelOlfato">Pérdida del Olfato</label>
                        <input required name="perdidaDelOlfato" type="radio" value="1"> SI
                        <input required name="perdidaDelOlfato" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="perdidaDelGusto">Pérdida del Gusto</label>
                        <input required name="perdidaDelGusto" type="radio" value="1"> SI
                        <input required name="perdidaDelGusto" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="tuvoContactoAislamiento">¿Estuvo en contacto con alguien en aislamiento?</label>
                        <input required name="tuvoContactoAislamiento" type="radio" value="1"> SI
                        <input required name="tuvoContactoAislamiento" type="radio" value="0"> NO
                    </div>

                    <div class="radio-button">
                        <label for="tuvoContactoUltDias">¿Estuvo en contacto con alguien que viajó en los últimos días?</label>
                        <input required name="tuvoContactoUltDias" type="radio" value="1"> SI
                        <input required name="tuvoContactoUltDias" type="radio" value="0"> NO
                    </div>
                </div>
                <div class="boton">
                    <button type="submit" value="Crear">Crear</button>
                </div>
            </form>
        </div>
        <div class=ladoDere></div>
    </div>
</body>

<?php
$template_path = 'estilo/Templates/footer.php';
include $template_path; ?>

</html>