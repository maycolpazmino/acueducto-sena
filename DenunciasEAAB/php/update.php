<?php
require_once('db.php');
$conectar = conn();

$idDenunciante = $_POST['denunciante_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$celular = $_POST['celular'];

$sql = "UPDATE denunciante SET nombres_denunciante='$nombres', apellidos_denunciante='$apellidos', ciudad_denunciante='$ciudad', direccion_denunciante='$direccion', email_denunciante='$email', celular_denunciante='$celular' WHERE denunciante_id='$idDenunciante'; ";
$sqlUpdate = mysqli_query($conectar, $sql) or die("Bad Query: $sqlSelect");

$sqlSelect = "SELECT * FROM denunciante WHERE denunciante_id = $idDenunciante";
$sqlGetDenuncianteByID = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");
    while ($row = mysqli_fetch_assoc($sqlGetDenuncianteByID)) {
        $_SESSION['denunciante_id'] = $row['denunciante_id'];
        include('usuarioExiste.php');
    }
?>
