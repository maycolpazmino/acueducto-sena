<?php
require_once("db.php");
$conectar = conn();

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM acueducto.denunciante WHERE denunciante_id=$id;";
$sqlEdit = mysqli_query($conectar, $sqlSelect) or die("Bad Query: $sqlSelect");
$row = mysqli_fetch_array($sqlEdit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/style_edit.css">
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
    <article class="main">
        <form method="post" action="update.php">
            <h2 class="center">Edite su Información</h2>
            <input type="hidden" name="denunciante_id" value="<?php echo $row['denunciante_id'] ?>">
            <div class="menu">
                <div class="form__group">
                    <input type="text" id="nombres" class="form__input" placeholder=" " name="nombres" value="<?php echo $row['nombres_denunciante'] ?>" required minlength="4" maxlength="25" size="25">
                    <label for="nombres" class="form__label">Nombres:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="apellidos" class="form__input" placeholder=" " name="apellidos" value="<?php echo $row['apellidos_denunciante'] ?>" required minlength="4" maxlength="25" size="25">
                    <label for="apellidos" class="form__label">Apellidos:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="ciudad" class="form__input" placeholder=" " name="ciudad" value="<?php echo $row['ciudad_denunciante'] ?>" required minlength="4" maxlength="25" size="25">
                    <label for="ciudad" class="form__label">Ciudad:</label>
                    <span class="form__line"></span>
                </div>
            </div>
            <div class="menu">
                <div class="form__group">
                    <input type="text" id="direccion" class="form__input" placeholder=" " name="direccion" value="<?php echo $row['direccion_denunciante'] ?>" required minlength="4" maxlength="25" size="25">
                    <label for="direccion" class="form__label">Dirección:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="email" id="email" class="form__input" placeholder=" " name="email" value="<?php echo $row['email_denunciante'] ?>" required minlength="4" maxlength="25" size="25">
                    <label for="email" class="form__label">Email:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="number" id="celular" class="form__input" placeholder=" " name="celular" value="<?php echo $row['celular_denunciante'] ?>" required minlength="4" maxlength="25" size="25">
                    <label for="celular" class="form__label">Celular:</label>
                    <span class="form__line"></span>
                </div>
                <div class="center">
                    <br>
                    <input type="submit" class="btn confirm" value="Enviar"></a>
                    <input type="reset" class="btn danger" value="Borrar"></a>
                </div>
        </form>
    </article>
    <footer class="footer">
        <img src="../image/acueducto-bogota-banner.jpg">
    </footer>
</body>

</html>