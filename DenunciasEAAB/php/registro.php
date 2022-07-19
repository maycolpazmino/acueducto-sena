<?php

require_once('db.php');
include('funciones.php');

$denuncia = $_POST['denuncia'];
$tipoId = $_POST['documento'];
$identificacion = $_POST['identificacion'];
$fecha = $_POST['fecha'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$descri_denuncia = $_POST['descri_denuncia'];
$solicitud_denuncia = $_POST['denuncias'];

$tipoIdentificacion = tipoId($tipoId);
$tipoDenuncia = tipoDenuncia($denuncia);

$conectar = conn();



if  (($tipoDenuncia == "") && ($tipoIdentificacion == "Documento de Identificación")) {
    echo '<script type="text/javascript">alert("Debe seleccionar Tipo de Documento\nDebe seleccionar Tipo de Denuncia");window.location.href="../index.php";</script>'; 
} elseif ($tipoDenuncia == "") {
    echo '<script type="text/javascript">alert("Debe seleccionar Tipo de Denuncia");window.location.href="../index.php";</script>';
} elseif ($tipoIdentificacion == "Documento de Identificación") {
    echo '<script type="text/javascript">alert("Debe seleccionar Tipo de Documento");window.location.href="../index.php";</script>';
 } {
    try {
        $sqlSelect = "SELECT denunciante_id FROM denunciante WHERE numero_id =$identificacion";
        $sqlGetDenuncianteByID = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");

        if (mysqli_num_rows($sqlGetDenuncianteByID) < 1) {
            $sqlDenunciante = "INSERT IGNORE INTO denunciante ( doc_iden_id, numero_id, nombres_denunciante, apellidos_denunciante, ciudad_denunciante, direccion_denunciante, email_denunciante, celular_denunciante ) 
        VALUES ('$tipoIdentificacion', '$identificacion', '$nombres', '$apellidos', '$ciudad', '$direccion', '$email', '$celular')";
            $resultDenunciante = mysqli_query($conectar, $sqlDenunciante) or die("Bad Query: $sqlDenunciante");

            $sqlSelect = "SELECT denunciante_id FROM denunciante WHERE numero_id =$identificacion";
            $sqlGetDenuncianteByID = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");
            while ($row = mysqli_fetch_assoc($sqlGetDenuncianteByID)) {
                $denunciante = $row['denunciante_id'];
            }

            $sqlDenuncia = "INSERT IGNORE INTO denuncias ( doc_denuncia_id , denunciante_id , descripcion_denuncia , solicitud_denuncia , fecha ) 
        VALUES ('$tipoDenuncia', '$denunciante', '$descri_denuncia', '$solicitud_denuncia', '$fecha')";
            $resultDenuncia = mysqli_query($conectar, $sqlDenuncia) or die("Bad Query: $sqlDenuncia");

            $sqlSelectDenunciaById = "SELECT consecutivo_denuncias FROM denuncias ORDER BY consecutivo_denuncias DESC LIMIT 1;";
            $sqlGetDenuniciaById = mysqli_query($conectar, $sqlSelectDenunciaById) or die("Bad Query: $sqlSelectDenunciaById");
            while ($row = mysqli_fetch_assoc($sqlGetDenuniciaById)) {
                $consecutivoDenunciasMax = $row['consecutivo_denuncias'];
            }

            $sqlSelectDenuncia = "SELECT consecutivo_denuncias, nombre_doc_denuncia, nombres_denunciante, apellidos_denunciante, nombre_doc_iden, numero_id, ciudad_denunciante, direccion_denunciante, email_denunciante, celular_denunciante, fecha, descripcion_denuncia, solicitud_denuncia FROM denuncias, denunciante, documento_denuncia, documento_identificacion where (documento_denuncia.doc_denuncia_id = denuncias.doc_denuncia_id) AND (documento_identificacion.doc_iden_id = denunciante.doc_iden_id) AND (denunciante.denunciante_id = denuncias.denunciante_id) AND consecutivo_denuncias = $consecutivoDenunciasMax ;";
            $sqlGetDenuniciaById = mysqli_query($conectar, $sqlSelectDenuncia) or die("Bad Query: $sqlSelectDenuncia");
            if (mysqli_num_rows($sqlGetDenuniciaById) > 0) {
                while ($row = mysqli_fetch_assoc($sqlGetDenuniciaById)) {
                    $msg = "<b>Denuncia #: </b>" . $row["consecutivo_denuncias"] . " <br> " .
                        "<b>Tipo de Denuncia: </b>" . $row["nombre_doc_denuncia"] . " <br> " .
                        "<b>Nombre Denunciante: </b>" . $row["nombres_denunciante"] . " <br> " .
                        "<b>Apellidos Denunciante: </b>" . $row["apellidos_denunciante"] . " <br> " .
                        "<b>Dcoumento de Identificación: </b>" . $row["nombre_doc_iden"] . " <br> " .
                        "<b>Numero de Identificación: </b>" . $row["numero_id"]  . " <br> " .
                        "<b>Ciudad: </b>" . $row["ciudad_denunciante"] . " <br> " .
                        "<b>Dirección: </b>" . $row["direccion_denunciante"] . "<br>" .
                        "<b>Email: </b>" . $row["email_denunciante"] . " <br> " .
                        "<b>Celulár: </b>" . $row["celular_denunciante"] . " <br> " .
                        "<b>Fecha: </b>" . $row["fecha"] . " <br>\n " .
                        "<b>Descripción Denuncia: </b>" . $row["descripcion_denuncia"] . " <br> " .
                        "<b>Solicitud Denuncia: </b>" . $row["solicitud_denuncia"] . " <br> " .
                        "<br><br><b>Correo enviado por el Sistema de Gestión de Denuncias del E.A.A.B.</b>" . "<br><br>" .
                        "<b>Maycol Eduardo Pazmiño Peña</b>" . "<br>" .
                        "<b>Tecnología ADSI - SENA</b>";
                }
            }
            $destino = $email;
            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: mepazmino@misena.edu.co' . "\r\n" .
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            mail($destino, "Denuncia", $msg, $headers);

            echo '<script type="text/javascript">alert("Usuario y Denuncia Registrada");window.location.href="../index.php";</script>';
        } else {

            while ($row = mysqli_fetch_assoc($sqlGetDenuncianteByID)) {
                $denunciante_id = $row['denunciante_id'];
            }

            $sqlDenuncia = "INSERT IGNORE INTO denuncias ( doc_denuncia_id , denunciante_id , descripcion_denuncia , solicitud_denuncia , fecha ) 
        VALUES ('$tipoDenuncia', '$denunciante_id', '$descri_denuncia', '$solicitud_denuncia', '$fecha')";
            $resultDenuncia = mysqli_query($conectar, $sqlDenuncia) or die("Bad Query: $sqlDenuncia");

            $sqlSelectDenunciaById = "SELECT consecutivo_denuncias FROM denuncias ORDER BY consecutivo_denuncias DESC LIMIT 1;";
            $sqlGetDenuniciaById = mysqli_query($conectar, $sqlSelectDenunciaById) or die("Bad Query: $sqlSelectDenunciaById");
            while ($row = mysqli_fetch_assoc($sqlGetDenuniciaById)) {
                $consecutivoDenunciasMax = $row['consecutivo_denuncias'];
            }

            $sqlSelectDenuncia = "SELECT consecutivo_denuncias, nombre_doc_denuncia, nombres_denunciante, apellidos_denunciante, nombre_doc_iden, numero_id, ciudad_denunciante, direccion_denunciante, email_denunciante, celular_denunciante, fecha, descripcion_denuncia, solicitud_denuncia FROM denuncias, denunciante, documento_denuncia, documento_identificacion where (documento_denuncia.doc_denuncia_id = denuncias.doc_denuncia_id) AND (documento_identificacion.doc_iden_id = denunciante.doc_iden_id) AND (denunciante.denunciante_id = denuncias.denunciante_id) AND consecutivo_denuncias = $consecutivoDenunciasMax ;";
            $sqlGetDenuncia = mysqli_query($conectar, $sqlSelectDenuncia) or die("Bad Query: $sqlSelectDenuncia");
            if (mysqli_num_rows($sqlGetDenuncia) > 0) {
                while ($row = mysqli_fetch_assoc($sqlGetDenuncia)) {
                    $msg = "<b>Denuncia #: </b>" . $row["consecutivo_denuncias"] . " <br> " .
                        "<b>Tipo de Denuncia: </b>" . $row["nombre_doc_denuncia"] . " <br> " .
                        "<b>Nombre Denunciante: </b>" . $row["nombres_denunciante"] . " <br> " .
                        "<b>Apellidos Denunciante: </b>" . $row["apellidos_denunciante"] . " <br> " .
                        "<b>Dcoumento de Identificación: </b>" . $row["nombre_doc_iden"] . " <br> " .
                        "<b>Numero de Identificación: </b>" . $row["numero_id"]  . " <br> " .
                        "<b>Ciudad: </b>" . $row["ciudad_denunciante"] . " <br> " .
                        "<b>Dirección: </b>" . $row["direccion_denunciante"] . "<br>" .
                        "<b>Email: </b>" . $row["email_denunciante"] . " <br> " .
                        "<b>Celulár: </b>" . $row["celular_denunciante"] . " <br> " .
                        "<b>Fecha: </b>" . $row["fecha"] . " <br>\n " .
                        "<b>Descripción Denuncia: </b>" . $row["descripcion_denuncia"] . " <br> " .
                        "<b>Solicitud Denuncia: </b>" . $row["solicitud_denuncia"] . " <br> " .
                        "<br><br><b>Correo enviado por el Sistema de Gestión de Denuncias del E.A.A.B.</b>" . "<br><br>" .
                        "<b>Maycol Eduardo Pazmiño Peña</b>" . "<br>" .
                        "<b>Tecnología ADSI - SENA</b>";
                }
                $destino = $email;
                $headers =  'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: mepazmino@misena.edu.co' . "\r\n" .
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                mail($destino, "Denuncia", $msg, $headers);
            }
            echo '<script type="text/javascript">alert("Denuncia Registrada");window.location.href="../index.php";</script>';
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

