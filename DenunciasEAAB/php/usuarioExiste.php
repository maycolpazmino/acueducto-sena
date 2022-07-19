<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Debe Denunciar</title>
    <link rel="stylesheet" href="../CSS/style.css">
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
    <article class="main" style="height: 450px;">
        <div class="information">
            <h2>Denuncias</h2>
            <hr>
            <p style="font-size: 18px;">Señor usuario, le damos la bienvenida al Sistema Nacional de Denuncia Virtual del Acueducto. <br><br>Le informamos que para dar trámite a las diferentes solicitudes que pueden realizarse en este Sistema, se requiere del registro de toda la información, asi como seleccionar el tipo de denuncia que quiere realizar.</p>
            <br>
        </div>
        <form class="form" method="post" action="registro.php">
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
            <div class="menu">
                <div class="form__group">
                    <input type="text" class="form__input" id="fecha" name="fecha" disable value="<?php echo date("d-m-20y"); ?>">
                    <label for="fecha" class="form__label">Fecha Radicación</label>
                </div>

                <?php
                include('funciones.php');
                $id = $_SESSION['denunciante_id'];
                try {
                    $sqlSelect = "SELECT * FROM denunciante WHERE denunciante_id=$id;";
                    $sqlGetDenuncianteByID = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");
                    while ($row = mysqli_fetch_assoc($sqlGetDenuncianteByID)) {
                        $denunciante_id = $row['denunciante_id'];
                        $tipoId = $row['doc_iden_id'];
                        $numeroId = $row['numero_id'];
                        $nombres = $row['nombres_denunciante'];
                        $apellidos = $row['apellidos_denunciante'];
                        $ciudad = $row['ciudad_denunciante'];
                        $direccion = $row['direccion_denunciante'];
                        $email = $row['email_denunciante'];
                        $celular = $row['celular_denunciante'];
                    }
                } catch (\Throwable $th) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                }
                ?>
                <div class="form__group">
                    <input type="text" class="form__input" id="documento" name="documento" disable value="<?php echo tipoDoc($tipoId); ?>">
                    <label for="documento" class="form__label">Tipo de Documento</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="identificacion" disable class="form__input" placeholder=" " name="identificacion" required minlength="4" value="<?php echo $numeroId; ?>" maxlength="25" size="25">
                    <label for="identificacion" class="form__label">Numero de Identficación:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="nombres" disable class="form__input" placeholder=" " name="nombres" value="<?php echo $nombres ?>" required minlength="4" maxlength="25" size="25">
                    <label for="nombres" class="form__label">Nombres:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="apellidos" disable class="form__input" placeholder=" " name="apellidos" value="<?php echo $apellidos ?>" required minlength="4" maxlength="25" size="25">
                    <label for="apellidos" class="form__label">Apellidos:</label>
                    <span class="form__line"></span>
                </div>
            </div>
            <div class="menu">
                <div class="form__group">
                    <input type="text" id="ciudad" disable class="form__input" placeholder=" " name="ciudad" value="<?php echo $ciudad ?>" required minlength="4" maxlength="25" size="25">
                    <label for="ciudad" class="form__label">Ciudad:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="direccion" disable class="form__input" placeholder=" " name="direccion" value="<?php echo $direccion ?>" required minlength="4" maxlength="25" size="25">
                    <label for="direccion" class="form__label">Dirección:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="email" id="email" disable class="form__input" placeholder=" " name="email" value="<?php echo $email ?>" required minlength="4" maxlength="25" size="25">
                    <label for="email" class="form__label">Email:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="number" id="celular" disable class="form__input" placeholder=" " name="celular" value="<?php echo $celular ?>" required minlength="4" maxlength="25" size="25">
                    <label for="celular" class="form__label">Celular:</label>
                    <span class="form__line"></span>
                </div>
                <div class="center">
                    <br>
                    <input type="submit" class="btn confirm" value="Enviar"></a>
                    <a href="actualizar.php?id=<?php echo $denunciante_id ?>" class="btn infor">Editar</a>
                </div>
            </div>
            <div class="menu">
                <label>Solicitud Denuncia</label>
                <textarea name="denuncias" required cols="35" rows="5" placeholder="Escribe aquí la descripción de los hechos."></textarea>
                <label>Decripción Denuncia</label>
                <textarea name="descri_denuncia" required cols="35" rows="5" placeholder="Escribe aquí la descripción de los hechos."></textarea>
            </div>
            <div class="center">
                <div>
                    <a href="../index.php" class="btn danger">Cancelar</a>
                </div>
            </div>
        </form>
    </article>
    <footer class="footer">
        <img src="../image/acueducto-bogota-banner.jpg">
    </footer>
</body>

</html>