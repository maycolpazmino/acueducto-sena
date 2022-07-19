<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Debe Denunciar</title>
    <link rel="stylesheet" href="../CSS/style.css">
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
                <select name="documento">
                    <option hidden selected>Documento de Identificación</option>
                    <option>Cédula de Ciudadanía</option>
                    <option>Tarjeta de Identidad</option>
                    <option>Pasaporte</option>
                    <option>Cédula Extranjeria</option>
                </select>
                <div class="form__group">
                    <input type="text" id="identificacion" class="form__input" placeholder=" " name="identificacion" required minlength="4" maxlength="25" size="25">
                    <label for="identificacion" class="form__label">Numero de Identficación:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="nombres" class="form__input" placeholder=" " name="nombres" required minlength="4" maxlength="25" size="25">
                    <label for="nombres" class="form__label">Nombres:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="apellidos" class="form__input" placeholder=" " name="apellidos" required minlength="4" maxlength="25" size="25">
                    <label for="apellidos" class="form__label">Apellidos:</label>
                    <span class="form__line"></span>
                </div>
            </div>
            <div class="menu">
                <div class="form__group">
                    <input type="text" id="ciudad" class="form__input" placeholder=" " name="ciudad" required minlength="4" maxlength="25" size="25">
                    <label for="ciudad" class="form__label">Ciudad:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="direccion" class="form__input" placeholder=" " name="direccion" required minlength="4" maxlength="25" size="25">
                    <label for="direccion" class="form__label">Dirección:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="email" id="email" class="form__input" placeholder=" " name="email" required minlength="4" maxlength="25" size="25">
                    <label for="email" class="form__label">Email:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="number" id="celular" class="form__input" placeholder=" " name="celular" required minlength="4" maxlength="25" size="25">
                    <label for="celular" class="form__label">Celular:</label>
                    <span class="form__line"></span>
                </div>
                <div class="center">
                    <br>
                    <input type="submit" class="btn confirm" value="Enviar"></a>
                    <input type="reset" class="btn danger" value="Borrar"></a>
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