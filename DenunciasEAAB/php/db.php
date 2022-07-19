<?php
//Configuración necesaria para conección con base de datos MySQL
function conn () {
    $hostname = "localhost";
    $usuariodb = "id19276476_acueducto";
    $passworddb = "@6ZyK+WQ9S98F7y+";
    $dbname = "id19276476_acuecucto";

    $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}
?>