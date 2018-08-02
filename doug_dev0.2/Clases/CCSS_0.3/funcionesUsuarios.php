<?php
include ".Clases/ClaseUsuario.php";

/* Este script se encargara del llamado a las funciones especificas */
switch ($_POST["accion"]) {
    case "agregar-usuario":
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $departamento = $_POST["departamento"];
        $localidad = $_POST["localidad"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];

        //$resultado = RegistrarUsuario($cedula, $nombre, $apellidos, $email, $departamento, $localidad, $password, $rol);

        $Usuario = new ClaseUsuario();
        $resultado = $Usuario->RegistrarUsuario($cedula, $nombre, $apellidos, $email, $departamento, $localidad, $password, $rol);

        if ($resultado["valido"]) {
            echo "Registro ingresado correctamente";
        } else {
            echo "Problemas al insertar usuario";
        }
        break;
        
    case "eliminar":
        $Usuario = new ClaseUsuario();
        $cedula = $_POST["cedula"];        
        $resultado = $Usuario->EliminaUsuario($cedula);
        if ($resultado["valido"]) {
            echo "El usuario se ha eliminado correctamente.";
        } else {
            echo "Problemas al eliminar el usuario";
        }
        break;
        
    case "actualizar":
        $cedula_busqueda = $_POST["cedula_busqueda"];
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $departamento = $_POST["departamento"];
        $localidad = $_POST["localidad"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];

        $Usuario = new ClaseUsuario();        
        $resultado = $Usuario->ActualizaUsuario($cedula_busqueda, $cedula, $nombre, $apellidos, $email, $departamento, $localidad, $password, $rol);

        if ($resultado["valido"]) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Problemas al actualizar el usuario.";
        }
        break;
        
    case "buscar-usuario":
        $Usuario = new ClaseUsuario(); 
        //echo "HOla";
        $retorno = $Usuario->BuscarUsuario($_POST['buscarcedula']);
        //$retorno = $Usuario->BuscarUsuarioarUsuario($_POST['cedula'], $_POST['nombre'], $_POST['email'], $_POST['rol'], $_POST['usuario'], $_POST['cedula_busqueda']);
        break;

    // Login
    case "login":
        $cedula = $_POST["usuario"];
        $password = $_POST["password"];

        $Usuario = new ClaseUsuario();
        $resultado = $Usuario->Login($cedula, $password);
        
        //YA NO SE USA ESTE IF PORQUE TENEMOS UN SCRIPT QUE HACE ESTA VALIDACION
//
//        if ($resultado["valido"]) {
//            header("Location:menu-principal.php");
//        } else {
//            echo "Datos de login incorrectos.";
//        }
        break;

    // Cerrar sesion
    case "logout":
        session_start();
        session_destroy();
        header("Location:index.php");
        break;
}
echo json_encode($resultado);
?>