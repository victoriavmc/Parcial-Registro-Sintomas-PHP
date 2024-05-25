<?php include 'conexion.php';
$bd = conectarBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $consulta = "SELECT * FROM personal WHERE pers_idpersonal = '$id'";
        $resultado = $bd->query($consulta);

        if ($resultado && $resultado->num_rows > 0) {
            $sql = "DELETE FROM personal WHERE pers_idpersonal = '$id'";
            if ($bd->query($sql) === TRUE) {
                echo '<script>alert("Eliminado con éxito!");</script>';
                echo '<script>window.location.href = "buscar.php";</script>';
            } else {
                echo '<script>alert("Ha ocurrido un error al eliminar el registro.");</script>';
                echo '<script>window.location.href = "buscar.php";</script>';
            }
        } else {
            echo '<script>alert("No se encontró ningún registro con el ID proporcionado. Revisa los ID Existentes");</script>';
            echo '<script>window.location.href = "buscar.php";</script>';
        }
    } else {
        echo '<script>alert("No se proporcionó un ID válido para eliminar el registro.");</script>';
        echo '<script>window.location.href = "buscar.php";</script>';
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
            <h1> <span>Eliminar el Personal</span></h1>
            <div>
                <form method="POST">
                    <label for="id">ID del Personal a Eliminar:</label>
                    <input type="number" id="id" name="id" placeholder="Ingrese ID del Personal" required>
                    <button type="submit">Eliminar</button>
                </form>
            </div>
        </div>
        <div class=ladoDere></div>
</body>

<?php
$template_path = 'estilo/Templates/footer.php';
include $template_path; ?>

</html>