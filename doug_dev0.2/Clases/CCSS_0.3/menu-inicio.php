<?php
include './validar-acceso.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Login CCSS 0.2</title>
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
<body style="background-color: #4db848;" align="center">
    <div class="logout"><h3><a href="" class="btnlogout">Cerrar Sesión</a></h3></div>
    <h3>Usuario Logueado: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['email']; ?></h3>
    <h3>Rol: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['rol']; ?></h3>
    <div class="main" style="margin-left: 44%; margin-top: -1%">           
        <?php
        if ($_SESSION['datos-usuario']['rol'] == 'admin') {
            echo "<h3><a href='Menus/MenuUsuarios.php'> Mantenimiento de Usuarios </a></h3>";
            echo "<h3><a href='Menus/MenuPacientes.php'> Mantenimiento de Pacientes </a></h3>"; 
        } else {
            echo "<br><h3><a href='ver-perfil.php'> Ver mi Perfil </a></h3>";
            echo "<h3><a href='Menus/MenuPacientes.php'> Mantenimiento de Pacientes </a></h3>"; 
        }
        ?>
    </div>  
    <!--<div style="margin-top: 2%">
        <img src="imagenes/maxi_navidad.png" alt="Imagen de MaxiPali">
    </div>-->
</body>
</html>