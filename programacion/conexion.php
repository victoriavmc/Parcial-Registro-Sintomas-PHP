<?php

function conectarBD()
{
    $bd = mysqli_connect('localhost', 'root', '', 'parcial');

    if (!$bd) {
        echo ('No se pudo conectar a la base de datos');
    }

    return $bd;
}
