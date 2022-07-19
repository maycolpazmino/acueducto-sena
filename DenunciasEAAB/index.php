<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncias E.A.A.B.</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body class="grid-container">
    <header class="header">
        <div class="container">
            <div class="title">
                Archivo Juridico <br>Acueducto y Alcantarillado de Bogotá
            </div>
        </div>
    </header>

    <aside class="logo"><img src="image/acueducto-bogota.jpg" style="width: 70%; height: 100%;"></aside>
    <article class="main" style="height: 450px;">
        <div class="main_div" style="text-align: justify; padding: 5px 60px 50px 40px;">
            <h2>Sistema de Gestión Denuncias E.A.A.B.</h2>
            <br>
            <p>Para informar las denuncias e incumplimientos, se ha diseñado un sistema de denuncias como una herramienta de comunicación en la empresa que permita la denuncia de incidencias o incumplimientos por la empresa a sus clientes.
            </p>
            <br>
            <p>Demandas, PQRS, derechos de petición, entre otros que tengan algún vínculo con el usuario, por medio de este software se quiere facilitar las tareas tanto para la empresa como para el usuario, permitiendo una mejora en la prestación del servicio de préstamos de documentos y evitar la duplicación de los mismos.</p>
        </div>

        <div class="Test" style="text-align: center">
            <div class="findById" style="margin-inline: 10px;">
                <div style="height: 80px; width: 100px; margin-right: 50px;">
                    <img src="image/realiceDenuncia.jpg" style="width: 160%">
                </div>
                <div>

                    <form method="post" action="php/denuncia.php">
                        <div class="form__group" style="padding-left: 35pt;">
                            <p style="font-size: 1.2rem; color: brown; color: rgb(11, 88, 133); text-align: center; margin-bottom: 10px;">Denuncie</p>
                            <div class="form__group">
                                <input type="text" id="identificacion" class="form__input" placeholder=" " name="identificacion" required minlength="4" maxlength="25" size="25">
                                <label for="identificacion" class="form__label">Numero de Identificación</label>
                                <span class="form__line"></span>
                            </div>
                            <input type="submit" class="boton" value="Realizar Denuncia">
                        </div>
                    </form>
                </div>
            </div>

            <div class="Test" style="text-align: center">
                <div class="findById" style="margin-inline: 10px;">
                    <div style="height: 80px; width: 100px; margin-right: 40px;">
                        <img src="image/iniciar-sesion.png" style="width: 100%">
                    </div>
                    <div>
                        <p style="font-size: 1.2rem; color: brown; padding-bottom: 15pt; color: rgb(11, 88, 133); text-align: center;">
                            Login - Admin</p>
                        <form method="post" action="php/logIn.php">
                            <div class="form__group">
                                <input type="text" id="username" class="form__input" placeholder=" " name="username" required minlength="4" maxlength="20" size="20">
                                <label for="username" class="form__label">Username</label>
                                <span class="form__line"></span>
                            </div>
                            <div class="form__group">
                                <input type="password" id="password" class="form__input" placeholder=" " name="password" required minlength="4" maxlength="20" size="20">
                                <label for="password" class="form__label">Password</label>
                                <span class="form__line"></span>
                                <input type="submit" class="boton" value="Ingresar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <footer class="footer">
        <img src="image/acueducto-bogota-banner.jpg">
    </footer>
</body>

</html>