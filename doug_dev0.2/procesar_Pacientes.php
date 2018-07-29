<?php
include ".Menu_IT/Clases/ClasePacientes.php";

/* Este script se encargara del llamado a las funciones especificas */
switch ($_POST["accion"]) {
    case "insertar":
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $localidad = $_POST["localidad"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $tipo_sangre = $_POST["tipo_sangre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $contacto_emergencia = $_POST["$contacto_emergencia"];

        //$resultado = RegistrarUsuario($cedula, $nombre, $apellidos, $email, $departamento, $localidad, $password, $rol);

        $Usuario = new ClasePaciente();
        $resultado = $Usuario->RegistrarPaciente($cedula, $nombre, $apellidos, $localidad, $fecha_nacimiento, 
                $tipo_sangre, $email, $telefono, $contacto_emergencia);

        if ($resultado["valido"]) {
            echo "Registro ingresado correctamente";
        } else {
            echo "Problemas al insertar usuario";
        }
        break;
    case "eliminar":
        $Usuario = new ClasePaciente();
        $cedula = $_POST["cedula"];        
        $resultado = $Usuario->EliminaPaciente($cedula);
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
        $localidad = $_POST["localidad"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $tipo_sangre = $_POST["tipo_sangre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $contacto_emergencia = $_POST["$contacto_emergencia"];

        $Usuario = new ClasePaciente();        
        $resultado = $Usuario->ActualizaPaciente($cedula_busqueda, $cedula, $nombre, $apellidos, $localidad, $fecha_nacimiento, 
                $tipo_sangre, $email, $telefono, $contacto_emergencia);

        if ($resultado["valido"]) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Problemas al actualizar el usuario.";
        }
        break;

    // Login
    case "login":
        $cedula = $_POST["usuario"];
        $password = $_POST["password"];

        $Usuario = new ClasePaciente();
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