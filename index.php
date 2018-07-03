<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar Sesión CCSS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="JS/Plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="JS/Plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="JS/Plugins/jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="JS/Scripts/usuario.js" type="text/javascript"></script> 
        <link href="CSS/general.css" rel="stylesheet" type="text/css"/> CSS/general.css debe de ser creada
    </head>
    <body>
        <div>
            <form id="frmLogin" name="frmLogin" method="POST" action="procesar.php"> procesar.php debe de ser creada
                <input type="text" id="usuario" name="usuario" placeholder="Digite su usuario" value="">  
                <input type="password" id="password" name="password" placeholder="Digite contraseña" value="">  
                <input type="hidden" id="accion" name="accion" value="login">
                <input type="button" id="btnLogin" name="btnLogin" value="Iniciar Sesión">
            </form>    
            <div class="loader"><img src="Imagenes/ajax-loader.gif" alt=""></div>
        </div>
    </body>
</html>
