<?php

require_once './conexion/miconexion.php';
require_once './Clases/ClaseUsuario.php';

switch ($_POST['accion']) {
    /* =================== ACCIONES DE USUARIO ======================== */
    case "login":
        session_start();
        $retorno = "";
        $sql = "SELECT * FROM tbl_usuarios WHERE cedula='" . $_POST['usuario'] . "' AND contrasena='" . $_POST['contrasena'] . "';";


        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows != 0) {
            $retorno['datos'] = mysqli_fetch_assoc($resultado);
            $_SESSION['datos-usuario'] = array(
                'nombre' => $retorno['datos']['nombre'],
                'apellidos' => $retorno['datos']['apellidos'],
                'cedula' => $retorno['datos']['cedula'],
                'departamento' => $retorno['datos']['departamento'],
                'localidad' => $retorno['datos']['localidad'],
                'email' => $retorno['datos']['email'],
                'rol' => $retorno['datos']['rol']
            );

            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }

        $resultado->free();
        break;

    case "agregar-usuario":
        $Usuario = new ClaseUsuario(); //parametros son incorrectos, ajustar de acuerdo a la BD ccss
        $retorno = $Usuario->AgregarUsuario($_POST['cedula'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['departamento'], $_POST['localidad'], $_POST['contrasena'], $_POST['rol']);
        break;

    case "buscar-usuario":
        $Usuario = new ClaseUsuario(); 
        //echo "HOla";
        $retorno = $Usuario->BuscarUsuario($_POST['buscarcedula']);
        //$retorno = $Usuario->BuscarUsuarioarUsuario($_POST['cedula'], $_POST['nombre'], $_POST['email'], $_POST['rol'], $_POST['usuario'], $_POST['cedula_busqueda']);
        break;
    
    case "listar-usuarios":
        $Usuario = new ClaseUsuario(); 
        $retorno = $Usuario->ListarUsuarios();
        break;
    
    case 'eliminar-usuario':
        $Usuario = new ClaseUsuario();
        //$Usrno = $Usuario->BuscarUsuario($_POST['buscarcedula']);
        $retorno = $Usuario->EliminarUsuario($_POST['cedula_busqueda']);
        //echo $Usrno;
        break;

    case "modificar-usuario":
        $Usuario = new ClaseUsuario();
        //$retouario = new ClaseUsuario(); /* =OJO ESTA BIEN= */
        $retorno = $Usuario->ModificarUsuario($_POST['cedula_busqueda'],$_POST['cedula'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['departamento'], $_POST['localidad'], $_POST['contrasena'], $_POST['rol']);
        //echo $retorno;
        break;

    case 'logout':
        session_start();
        session_destroy();
        $retorno = '';
        break;
    
    /*=================== ACCIONES DE ARTICULO ======================== 
    case "agregar-articulo":
        $Articulo = new ClaseArticulo();
        $retorno = $Articulo->AgregarArticulo($_POST['codigo'], $_POST['marca'], $_POST['descripcion'], $_POST['precio'], $_POST['cantidad']);
        break;

    case "buscar-articulo":
        $Articulo = new ClaseArticulo(); 
        $retorno = $Articulo->BuscarArticulo($_POST['buscarcodigo']);

        break;
    
    case "buscar-articulo":
        $Articulo = new ClaseArticulo(); 
        //echo "HOla";
        $retorno = $Articulo->BuscarArticulo($_POST['buscarcodigo']);
        //$retorno = $Usuario->BuscarUsuarioarUsuario($_POST['cedula'], $_POST['nombre'], $_POST['email'], $_POST['rol'], $_POST['usuario'], $_POST['cedula_busqueda']);

        break;

    case 'eliminar-articulo':
        $Articulo = new ClaseArticulo();
        //$Usrno = $Usuario->BuscarUsuario($_POST['buscarcedula']);
        $retorno = $Articulo->EliminarArticulo($_POST['buscarcodigo']);
        //echo $Usrno;
        break;

    case "modificar-articulo":
        $Articulo = new ClaseArticulo();
        //$retouario = new ClaseUsuario(); // =OJO ESTA BIEN= 
        $retorno = $Articulo->ModificarArticulo($_POST['cedula'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['usuario'], $_POST['contrasena'], $_POST['rol'],$_POST['cedula_busqueda']);
        //echo $retorno;
        break;
    
    // =================== ACCIONES DE COMPRA ======================== 
    case "agregar-compra":
        $Compra = new ClaseCompra();
        $retorno = $Compra->AgregarCompra($_POST['cedula'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['usuario'], $_POST['contrasena'], $_POST['rol']);
        break;

    case "buscar-compra":
        $Compra = new ClaseCompra(); 
        //echo "HOla";
        $retorno = $Usuario->BuscarUsuario($_POST['buscarcedula']);
        //$retorno = $Usuario->BuscarUsuarioarUsuario($_POST['cedula'], $_POST['nombre'], $_POST['email'], $_POST['rol'], $_POST['usuario'], $_POST['cedula_busqueda']);

        break;

    case 'eliminar-compra':
        $Usuario = new ClaseUsuario();
        //$Usrno = $Usuario->BuscarUsuario($_POST['buscarcedula']);
        $retorno = $Usuario->EliminarUsuario($_POST['cedula_busqueda']);
        //echo $Usrno;
        break;

    case "modificar-compra":
        $Usuario = new ClaseUsuario();
        //$retouario = new ClaseUsuario(); // =OJO ESTA BIEN= 
        $retorno = $Usuario->ModificarUsuario($_POST['cedula'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['usuario'], $_POST['contrasena'], $_POST['rol'],$_POST['cedula_busqueda']);
        //echo $retorno;
        break;*/
    
}

echo json_encode($retorno);
