<!-- HEAD DE NAVEGADOR -->
<?php
$template_path = './estilo/templates/head.php';
include $template_path; ?>

<!-- COMIENZA BODY -->

<body>
    <!-- DIVIDO EN TRES LA CAJA PRINCIPAL -->
    <div class=cajaPrincipal>
        <!-- LADO IZQUIERDO -->
        <div class=ladoIzq></div>
        <!-- MEDIO -->
        <div class=mid>
            <h1><span>Planilla del Protocolo de Ingreso del Personal</span></h1>
            <div class=lista>
                <div>
                    <a href="./crear.php"><img width="40" src="./estilo/img/Icono.png" alt="crear">CREAR</a>
                </div>

                <div>
                    <a href="./modificar.php"><img width="40" src="./estilo/img/Icono.png" alt="modificar">MODIFICAR</a>
                </div>

                <div>
                    <a href="./eliminar.php"><img width="40" src="./estilo/img/Icono.png" alt="eliminar">ELIMINAR</a>
                </div>

                <div>
                    <a href="./buscar.php"><img width="40" src="./estilo/img/Icono.png" alt="buscar">BUSCAR</a>
                </div>
            </div>
        </div>
        <!-- LADO DERECHO -->
        <div class=ladoDere></div>
    </div>
    <!-- FOOTER-->
    <?php
    $template_path = './estilo/templates/footer.php';
    include $template_path; ?>
</body>