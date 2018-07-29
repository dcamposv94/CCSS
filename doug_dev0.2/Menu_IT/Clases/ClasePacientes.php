<?php

Class ClasePaciente 
{
    /* ATRIBUTOS */

    //Estos atributos representan los campos
    //de la tabla tbl_usuarios
    private $cedula;
    private $nombre;
    private $apellidos;
    private $localidad;
    private $fecha_nacimiento;
    private $tipo_sangre;
    private $email;
    private $telefono;
    private $contacto_emergencia;


    /* CONSTRUCTOR */

    function ClasePaciente($cedula = "", $nombre = "", $apellidos = "", $localidad = "", $fecha_nacimiento = "",
            $tipo_sangre = "", $email = "", $telefono = "", $contacto_emergencia ="") 
    {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->localidad = $localidad;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->tipo_sangre = $tipo_sangre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->contacto_emergencia = $contacto_emergencia;
    }

    /* METODOS SET Y GET */

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
    
    //LOCALIDAD
    function getLocalidad() {
        return $this->localidad;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }
    
    //FECHA NACIMIENTO
    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    
    //TIPO SANGRE
    function getTipo_sangre() {
        return $this->tipo_sangre;
    }

    function setTipo_sangre($tipo_sangre) {
        $this->tipo_sangre = $tipo_sangre;
    }

    //EMAIL
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    //PASSWORD
    function getTelefono() {
        return $this->telefono;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    //ROL
    function getContacto_emergencia() {
        return $this->contacto_emergencia;
    }

    function setContacto_emergencia($contacto_emergencia) {
        $this->contacto_emergencia = $contacto_emergencia;
    }

    //Metodo Registrar Usuarios
    function RegistrarPaciente($cedula = "", $nombre = "", $apellidos = "", $localidad = "", $fecha_nacimiento = "",
            $tipo_sangre = "", $email = "", $telefono = "", $contacto_emergencia ="") 
    {
        require "./BD/conexion.php"; // referencia de la conexion
        $password = md5($password);
        $retorno = array(); // se crear arreglo para guardar resultados
        // Se crea el query para realizar el INSERT
        $sql = "INSERT INTO tbl_pacientes(cedula,nombre,apellidos,localidad,fecha_nacimiento,tipo_sangre,email,telefono,contacto_emergencia)";
        $sql .= "VALUE ('$cedula','$nombre','$apellidos','$localidad','$fecha_nacimiento','$tipo_sangre','$email','$telefono','$contacto_emergencia')";

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
    function EliminaPaciente($cedula) {
        require "./BD/conexion.php"; // referencia de la conexion
        $retorno = array();

        $sql = "DELETE FROM tbl_pacientes WHERE cedula=$cedula";
        $resultado = $BD->query($sql); // se ejecutar el query

        if ($BD->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Metodo Actualizar Usuarios
    function ActualizaPaciente($cedula_busqueda, $cedula, $nombre, $apellidos, $localidad, $fecha_nacimiento, 
            $tipo_sangre, $email, $telefono, $contacto_emergencia) {
        require "./BD/conexion.php"; // referencia de la conexion
        $retorno = array();
        $sql = "UPDATE tbl_pacientes ";
        $sql .= "SET cedula ='$cedula'";
        $sql .= ",nombre ='$nombre'";
        $sql .= ",localidad ='$localidad'";
        $sql .= ",fecha_nacimiento ='$fecha_nacimiento'";
        $sql .= ",tipo_sangre ='$tipo_sangre'";
        $sql .= ",email ='$email'";
        $sql .= ",telefono ='$telefono'";
        $sql .= ",contacto_emergencia ='$contacto_emergencia'";
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
        $retorno = array(); //Un arreglo para retornar valores a procesar.php
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
    function ListarPaciente() {
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