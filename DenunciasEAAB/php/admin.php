<?php
require_once('db.php');
include('funciones.php');
$conectar = conn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/style_admin.css">
    <script src="../JS/script.js"></script>
</head>

<body class="grid-container">
    <header class="header">
        <div class="container">
            <div class="title">
                Archivo Juridico <br>Acueducto y Alcantarillado de Bogotá
            </div>
        </div>
    </header>

    <aside class="logo"><img src="../image/acueducto-bogota.jpg" style="width: 70%; height: 100%;"></aside>
    <article class="main" style="height: auto;">
        <div class="container">
            <br>
            <form class="form" method="post" action="busqueda.php" style="display: inline-flex; max-width: 1400px; text-align: center;">
                <div class="roundGroup">
                    <input type="radio" id="derechoPeticion" name="denuncia" value="Derecho de Petición">
                    <label for="derechoPeticion">Derecho de Petición</label>
                    <input type="radio" id="accionTutela" name="denuncia" value="Acción de Tutela">
                    <label for="accionTutela">Acción de Tutela</label>
                    <input type="radio" id="procesoPenal" name="denuncia" value="Proceso Penal">
                    <label for="procesoPenal">Proceso Penal</label>
                    <input type="radio" id="nulidadRestablecimiento" name="denuncia" value="Nulidades y Restablecimiento">
                    <label for="nulidadRestablecimiento">Nulidades y Restablecimiento</label>
                    <input type="radio" id="reparacionDirecta" name="denuncia" value="Reparación Directa">
                    <label for="reparacionDirecta">Reparación Directa</label>
                </div>
                <br>
                <div class="form__group" style="max-width: 200px;">
                    <input type="text" id="identificacion" class="form__input" placeholder=" " name="identificacion" minlength="4" maxlength="25" size="25">
                    <label for="identificacion" class="form__label">Numero de Identficación:</label>
                    <span class="form__line"></span>
                </div>
                <input type="submit" class="btn infor" value="Busqueda" style="margin: 8px;"></a>
            </form>
            <br>
            <table class="bordered">
                <caption style="padding: 10px;">
                    Denuncias Acueducto
                </caption>
                <thead>
                    <tr>
                        <th>Tipo de Denuncia</th>
                        <th>Nombres Denunciante</th>
                        <th>Apellidos Denunciante</th>
                        <th>Documento de identificación</th>
                        <th>Número de Identificación</th>
                        <th>Fecha</th>
                        <th>Enviar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>

                <?php
                $sqlSelect = "SELECT consecutivo_denuncias, nombre_doc_denuncia, nombres_denunciante, apellidos_denunciante, nombre_doc_iden, numero_id, fecha FROM denuncias, denunciante, documento_denuncia, documento_identificacion where (documento_denuncia.doc_denuncia_id = denuncias.doc_denuncia_id) AND (documento_identificacion.doc_iden_id = denunciante.doc_iden_id) AND (denunciante.denunciante_id = denuncias.denunciante_id) ORDER BY nombre_doc_denuncia;";
                $sqlGetDenuncianteByID = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");
                $numero = 0;
                while ($row = mysqli_fetch_assoc($sqlGetDenuncianteByID)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['nombre_doc_denuncia'] ?></td>
                            <td><?php echo $row['nombres_denunciante'] ?></td>
                            <td><?php echo $row['apellidos_denunciante'] ?></td>
                            <td><?php echo $row['nombre_doc_iden'] ?></td>
                            <td><?php echo $row['numero_id'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><a href="enviar.php?id=<?php echo $row['consecutivo_denuncias'] ?>" class="btn confirm" onclick="confirmSend()">Enviar</a></td>
                            <td><a href="delete.php?id=<?php echo $row['consecutivo_denuncias'] ?>" class="btn danger" onclick="return confirmDelete()">Eliminar</a></td>
                        </tr>
                    </tbody>
                <?php
                    $numero++;
                }
                ?>
            </table>
            <br>
            <div style="text-align: center;">
                <?php
                echo "<colspan=\"15\"><font size=\"2\"><b><u>Total Denuncias</u>: " . $numero .
                    "</b></font>"; ?>
                <a href="../index.php" class="btn danger">Logout</a>

            </div>
            <br>
        </div>
    </article>
    <footer class="footer">
        <img src="../image/acueducto-bogota-banner.jpg">
    </footer>
</body>

</html>