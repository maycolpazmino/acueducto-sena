<?php
//Configuración necesaria para conección con base de datos MySQL
function conn () {
    $hostname = "localhost";
    $usuariodb = "id19276476_acueducto";
    $passworddb = "iL75aqtK?5U%RjK=";
    $dbname = "id19276476_acuecucto";

    $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}
?>