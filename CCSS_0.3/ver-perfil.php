<?php
include './validar-acceso.php';
?>

<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
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
    <h3>Nombre: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['nombre']; ?></h3>
    <h3>Apellidos: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['apellidos']; ?></h3>
    <h3>Telefono: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['telefono']; ?></h3>
    <h3>Email: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['email']; ?></h3>
    <h3>Rol: <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['rol']; ?></h3>
    <h3><a href='menu-inicio.php'>Volver a Menu Inicio</a></h3>
</body>
</html>

