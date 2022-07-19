<?php
require_once('db.php');
$conectar = conn();

$id = $_GET['id'];

$query= "DELETE FROM denuncias WHERE consecutivo_denuncias=$id;";
$sqlDelete = mysqli_query($conectar, $query) or die("Bad Query: $query");

if ($sqlDelete){
    echo '<script alert("Denuncia Eliminada");window.location.href="admin.php";</script>';
    header('Location: admin.php');
} else {
    echo '<script alert("Denuncia No Eliminada");window.location.href="admin.php";</script>';
}

?>