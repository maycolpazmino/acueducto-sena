<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncia</title>
</head>
<body>
    
</body>
</html>
<?php

require_once('db.php');

$conectar = conn();

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $sqlSelect = "SELECT username, password FROM admin WHERE username = '".$username."' and password = '".$password."'";
    $sqlGetAdmin= mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");

    if (mysqli_num_rows($sqlGetAdmin) < 1) {
        echo '<script type="text/javascript">alert("Usuario y/o Contraseña Erroneos\nIntente Nuevamente");window.location.href="../index.php";</script>';
    } else {
        include('admin.php');
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>