<?php
$template_path = "conexion.php";
include_once($template_path);

$conexion = conectarBD();

$sql_todos = "SELECT * FROM personal";
$resultado_todos = mysqli_query($conexion, $sql_todos);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM personal WHERE pers_idpersonal = '$id'";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
    } else {
        echo "<script>alert('No se encontró ningún registro con el ID proporcionado.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
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
            <h1><span>Planilla Protocolo Ingreso Personal</span></h1>
            <div class="cuadroPlanilla">
                <div class=buscar>
                    <form method="GET">
                        <label for="id">ID del Personal:</label>
                        <input type="number" id="id" name="id" placeholder="Ingrese ID del Personal" required>
                        <button type="submit">Buscar</button>
                    </form>
                </div>
                <div class="cuadritoempleado">
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Temperatura</th>
                            <th>Tos</th>
                            <th>Insuficiencia Respiratoria</th>
                            <th>Dolor de Garganta</th>
                            <th>Perdida del Olfato</th>
                            <th>Perdida del Gusto</th>
                            <th>Otros Sintomas</th>
                            <th>¿Estuvo en contacto con alguien en aislamiento?</th>
                            <th>¿Estuvo en contacto con alguien que viajo en los ultimos dias?</th>
                            <th>Viajes (Lugar)</th>
                            <th>Observaciones</th>
                        </tr>
                        <?php
                        if ($resultado_todos->num_rows > 0) {
                            while ($row = $resultado_todos->fetch_assoc()) {
                                echo "<tr";
                                if (isset($_GET['id']) && $row["pers_idpersonal"] == $_GET['id']) {
                                    echo " style='background-color: yellow;'";
                                }
                                echo ">";
                                echo "<td>" . $row["pers_idpersonal"] . "</td>";
                                echo "<td>" . $row["pers_fecha"] . "</td>";
                                echo "<td>" . $row["pers_hora"] . "</td>";
                                echo "<td>" . $row["pers_nombre"] . "</td>";
                                echo "<td>" . $row["pers_apellido"] . "</td>";
                                echo "<td>" . ($row["pers_temperatura"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . ($row["pers_tos"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . ($row["pers_insuficienciaRespiratoria"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . ($row["pers_dolorDeGarganta"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . ($row["pers_perdidaDelOlfato"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . ($row["pers_perdidaDelGusto"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . $row["pers_otrosSintomas"] . "</td>";
                                echo "<td>" . ($row["pers_tuvoContactoAislamiento"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . ($row["pers_tuvoContactoUltDias"] ? "Sí" : "---") . "</td>";
                                echo "<td>" . $row["pers_lugarViaje"] . "</td>";
                                echo "<td>" . $row["pers_observaciones"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='16'>No hay datos del personal</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class=ladoDere></div>
    </div>
</body>
<?php
$template_path = 'estilo/Templates/footer.php';
include $template_path; ?>