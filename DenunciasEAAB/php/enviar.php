<?php
require_once('db.php');
$conectar = conn();

$id = $_GET['id'];

$sql = "SELECT consecutivo_denuncias, nombre_doc_denuncia, nombres_denunciante, apellidos_denunciante, nombre_doc_iden, numero_id, ciudad_denunciante, direccion_denunciante, email_denunciante, celular_denunciante, fecha, descripcion_denuncia, solicitud_denuncia FROM denuncias, denunciante, documento_denuncia, documento_identificacion where (documento_denuncia.doc_denuncia_id = denuncias.doc_denuncia_id) AND (documento_identificacion.doc_iden_id = denunciante.doc_iden_id) AND (denunciante.denunciante_id = denuncias.denunciante_id) AND consecutivo_denuncias = $id ;";
$result = mysqli_query($conectar, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
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
    $destino = "maycolp88@icloud.com";
    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: mepazmino@misena.edu.co' . "\r\n" .
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($destino, "Denuncia", $msg, $headers);
    header('Location: admin.php');
} else {
    echo "0 results";
}
