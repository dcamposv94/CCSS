<?php

Class ClaseUsuario {
    /* ATRIBUTOS */

    //Estos atributos representan los campos
    //de la tabla tbl_usuarios
    private $id;
    private $cedula;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;

    /* CONSTRUCTOR */

    function ClaseUsuario($id = "", $cedula = "", $nombre = "", $apellidos = "", $email = "", $password = "", $rol="") {
        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    /* METODOS SET Y GET */

    //ID
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    //CEDULA
    function getCedula() {
        return $this->cedula;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    //NOMBRE
    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    //APELLIDOS
    function getApellidos() {
        return $this->apellidos;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    //EMAIL
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    //PASSWORD
    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->passoword = $password;
    }
    //ROL
    function getRol() {
        return $this->rol;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    //Metodo Registrar Usuarios
    function RegistrarUsuario($cedula, $nombre, $apellidos, $email, $password, $rol) {
        require "./BD/conexion.php"; // referencia de la conexion
        $password = md5($password);
        $retorno = array(); // se crear arreglo para guardar resultados
        // Se crea el query para realizar el INSERT
        $sql = "INSERT INTO tbl_usuarios(cedula,nombre,apellidos,email,password,rol)";
        $sql .= "VALUE ('$cedula','$nombre','$apellidos','$email','$password','$rol')";

        $resultado = $BD->query($sql); // se ejecutar el query
        $id = $BD->insert_id; //se obtiene el id insertado
        // se verifica que se haya insertado el registro
        if ($id != 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno; // se retorna el resultado
    }

    //Metodo Eliminar Usuario
    function EliminaUsuario($cedula) {
        require "./BD/conexion.php"; // referencia de la conexion
        $retorno = array();

        $sql = "DELETE FROM tbl_usuarios WHERE cedula=$cedula";
        $resultado = $BD->query($sql); // se ejecutar el query

        if ($BD->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Metodo Actualizar Usuarios
    function ActualizaUsuario($cedula_busqueda, $cedula, $nombre, $apellidos, $email, $password, $rol) {
        require "./BD/conexion.php"; // referencia de la conexion
        $retorno = array();
        $password = md5($password);
        $sql = "UPDATE tbl_usuarios ";
        $sql .= "SET cedula ='$cedula'";
        $sql .= ",nombre ='$nombre'";
        $sql .= ",apellidos ='$apellidos'";
        $sql .= ",email ='$email'";
        $sql .= ",password ='$password'";
        $sql .= ",rol ='$rol'";
        $sql .= " WHERE cedula='$cedula_busqueda'";

        $resultado = $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Metodo Login
    function Login($cedula, $pass) {
        require "./BD/conexion.php";  //Conexion a la BD
        $retorno = array(); //Un arreglo para retornas valores a procesar.php
        $pass = md5($pass);
        $sql = "SELECT * FROM tbl_usuarios WHERE cedula = '$cedula' AND password='$pass'";

        $resultado = $BD->query($sql);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION["datos-usuario"] = array(
                "id" => $usuario["id"],
                "cedula" => $usuario["cedula"],
                "nombre" => $usuario["nombre"],
                "apellidos" => $usuario["apellidos"],
                "email" => $usuario["email"],
                "password" => $usuario["password"],
                "rol" => $usuario["rol"]
            );
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Metodo Listar Usuarios
    function ListarUsuarios() {
        require "./BD/conexion.php";  //Conexion a la BD
        $retorno = array(); //Un arreglo para retornas valores a procesar.php

        $sql = "SELECT * FROM tbl_usuarios"; // se arma el query

        $resultado = $BD->query($sql); // Se ejecuta el query
        //Se valida que el query haya retornado usuarios
        if ($resultado->num_rows != 0) {
            $usuarios = array(); //Se crea arreglo para almancenar usuarios
            //Recorrer los resultados retornados por la BD y
            //almacenarlos en un arreglo.
            while ($registro = $resultado->fetch_assoc()) {
                //array push se usa para agregar elementos a un arreglo.
                array_push($usuarios, $registro);
            }
            $retorno["valido"] = true;
            $retorno["usuarios"] = $usuarios;
        } else {
            //Si el query no retorna usuarios
            $retorno["valido"] = false;
        }
        return $retorno;
    }

}

//Fin de la clase
?>