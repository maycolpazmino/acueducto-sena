<?php

require_once('db.php');

$conectar = conn();

$identificacion = $_POST["identificacion"];
session_start();
$_SESSION['identificacion']=$identificacion;

try {
    $sqlSelect = "SELECT denunciante_id FROM denunciante WHERE numero_id = $identificacion";
    $sqlGetDenuncianteByID = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");

    if (mysqli_num_rows($sqlGetDenuncianteByID) < 1){
        include('usuarioNuevo.php');
    }
    else {
        while ($row = mysqli_fetch_assoc($sqlGetDenuncianteByID)) {
            $_SESSION['denunciante_id'] = $row['denunciante_id'];
            include('usuarioExiste.php');
        }
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
};


?>