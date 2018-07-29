<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!--JS General del Sitio-->
    <script src="js/jquery/jquery-1.10.2.js" type="text/javascript"></script>                        
    <script src="js/jquery/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
    <script src="js/jquery/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="js/script/eventos.js" type="text/javascript"></script>
    <script src="js/plugins/messi/_main.js" type="text/javascript"></script>
    <script src="js/plugins/messi/extensions.js" type="text/javascript"></script>

    <!--CSS General del Sitio-->
    <link href="css/plugins/animate.css" rel="stylesheet">
    <link href="css/plugins/messi.css" rel="stylesheet">
    <link href="css/general.css" rel="stylesheet">
</head>
<body style="background-color: #99ffff;" align="center">
    <h2>Usuario Logueado: <?php echo $_SESSION['datos-usuario']['usuario']; ?></h2>
    <h3>Rol: <?php echo $_SESSION['datos-usuario']['rol']; ?></h3>
    <div class="main" style="margin-left: 44%; margin-top: 2%">           
        <?php
        if ($_SESSION['datos-usuario']['rol'] == 'admin') { //'admin' no es correcto, modificarlo de acuerdo al rol en BD
            ?>
            <a href="agregar-usuario.php">Agregar Usuario</a><br><br>
            <a href="eliminar-usuario.php">Eliminar Usuario</a><br><br>
            <a href="modificar-usuario.php">Actualizar Usuario</a><br><br>
            <a href="buscar-usuario.php">Buscar Usuario</a><br><br>
            <a href="mostrar-usuarios.php">Ver todos los Usuarios</a><br><br>
            <a href="menu-inicio.php">Volver al Menú Principal</a><br>

            <?php
        } else {
            ?>
            <a href="mostrar-usuarios.php">Ver todas las Compras</a> <!--CAMBIAR LINK Y OPCION-->      
            <?php
        }
        ?>
    </div> 
    <div style="margin-top: 2%">
        <img src="imagenes/maxi_navidad.png" alt="Imagen de MaxiPali">
    </div>
</body>
</html>