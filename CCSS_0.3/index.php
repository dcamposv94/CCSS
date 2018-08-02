<html>

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
<body style="background-color: #4db848;">
    <div class="main">            
        <form id="frmLogin" name="frmLogin" method="POST" action="">
            <p>Usuario</p>            
            <input type="text" name="usuario" id="usuario" />            
            <p>Contraseña </p>            
            <input type="password" name="contrasena" id="contrasena" />
            <input type="button" name="btnLogin" id="btnLogin" value="Login" /> 
        </form>
    </div>    
    <div id="imagen">
        <img class="loader" src="imagenes/ajax-loader.gif" alt="" />
    </div>
    <div id="mensaje"></div>
</body>
</html>