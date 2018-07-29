$(function () {
    /*==== LISTENER =====*/
    $('#btnRegistrar').click(function (e) {
        $('.loader').addClass('activo');
       //Primero valido los campos del formulario
        var form_valido = ValidarFormularioUsuario();

        if (form_valido.length > 0) {
            //alert(form_valido);
            var dialog = new Messi(
                    'Los siguientes campos son obligatorios' + ' ' + form_valido,
                    {
                        title: 'Error al Registrar Usuario.',
                        titleClass: 'anim error',
                        buttons: [{id: 0, label: 'Close', val: 'X'}]
                    }
            );
        } else {
            Registrar();
        }

    });

    $('#btnBuscaUsuario').click(function (e) {
        BuscaUsuario();
         $('#frmActualizar').empty();
          $('#frmActualizar').removeClass('lleno');
    });

    $('#btnBuscaUsuarioEliminar').click(function (e) {
        BuscaUsuarioEliminar();

    });
    
    $('#btnConsultaUsuario').click(function (e) {
        BuscaUsuarioConsulta();
    });

    //se utiliza la funcion 'on' cuando agregamos una etiqueta html
    // con jquery y necesitamos agregarle un evento
    $(document).on('click', '.actualizar', function (e) {
        ActualizarUsuario();
    });

    $(document).on('click', '.eliminar', function (e) {
        EliminarUsuario();
    });


    /*===== FUNCIONES ====*/
    function Registrar() {
        $_form = $('#frmUsuario');
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=agregar-usuario',
            success: function (_data) {
                valido = $.parseJSON(_data);
                if (valido) {
                    var dialog = new Messi(
                            'El registro se ha ingresado correctamente.',
                            {
                                title: 'Informacion de Registro.',
                                titleClass: 'anim info',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );

                } else {
                    var dialog = new Messi(
                            'No se registro correctamente.',
                            {
                                title: 'Error al realizar Usuario.',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );
                }
            }
        })
    }//fin Login

    //Funcion Valida los campos del formulario
    function ValidarFormularioUsuario() {
        var vacios = new Array();
        if ($("#cedula").val().length < 1) {
            vacios.push("cedula");
        }
        if ($("#nombre").val().length < 1) {
            vacios.push("nombre");
        }
        if ($("#apellidos").val().length < 1) {
            vacios.push("apellidos");
        }
        if ($("#telefono").val().length < 1) {
            vacios.push("telefono");
        }
        if ($("#email").val().length < 1) {
            vacios.push("email");
        }
        if ($("#usuario").val().length < 1) {
            vacios.push("usuario");
        }
        if ($("#contrasena").val().length < 1) {
            vacios.push("contrasena");
        }
        if ($("#rol").val().length < 1) {
            vacios.push("rol");
        }
        return vacios;
    }//fin ValidarFormulario

    function BuscaUsuario() {
        if ($('#frmActualizar').hasClass("lleno")) {
            alert('ya tiene datos');
        } else {
            $_form = $('#frmUsuario');
            $.ajax({
                type: 'post',
                dataType: "json",
                url: 'funciones.php',
                data: $_form.serialize() + '&accion=buscar-usuario',
                success: function (_data) {
                    //alert(_data);
                    $_html = '<input type="text" name="cedula" id="cedula" value="' + _data.datos.cedula + '"/>'
                    $_html += '<input type="text" name="nombre" id="nombre" value="' + _data.datos.nombre + '"/>'
                    $_html += '<input type="text" name="apellidos" id="apellidos" value="' + _data.datos.apellidos + '"/>'
                    $_html += '<input type="text" name="telefono" id="telefono" value="' + _data.datos.telefono + '"/>'
                    $_html += '<input type="text" name="email" id="email" value="' + _data.datos.email + '"/>'
                    $_html += '<input type="text" name="usuario" id="usuario" value="' + _data.datos.usuario + '"/>'
                    $_html += '<input type="password" name="contrasena" id="contrasena" value="' + _data.datos.contrasena + '"/>'
                    $_html += '<input type="text" name="rol" id="rol" value="' + _data.datos.rol + '"/>'
                    $_html += '<input type="button" name="btnActualizar" id="btnActualizar" class="actualizar" value="Actualizar Registro"/>'
                    $('#frmActualizar').append($_html);
                    $('#frmActualizar').addClass('lleno');
                }
            })

        }//else

    }//fin Login

    function BuscaUsuarioConsulta() {
        if (!$('#frmActualizar').hasClass("lleno")) {

            $_form = $('#frmUsuario');
            $.ajax({
                type: 'post',
                dataType: "json",
                url: 'funciones.php',
                data: $_form.serialize() + '&accion=buscar-usuario',
                success: function (_data) {
                    $_html = '<input type="text" name="cedula" id="cedula" value="' + _data.datos.cedula + '" disabled/>'
                    $_html += '<input type="text" name="nombre" id="nombre" value="' + _data.datos.nombre + '"disabled/>'
                    $_html += '<input type="text" name="email" id="email" value="' + _data.datos.email + '"disabled/>'
                    $_html += '<input type="text" name="rol" id="rol" value="' + _data.datos.rol + '"disabled/>'
                    $_html += '<input type="text" name="usuario" id="usuario" value="' + _data.datos.usuario + '"disabled/>'
                    
                    $('#frmActualizar').append($_html);
                    $('#frmActualizar').addClass('lleno');
                }
            })

        }//else

    }//fin Login

    function BuscaUsuarioEliminar() {
        $_form = $('#frmUsuario');
        $.ajax({
            type: 'post',
            dataType: "json",
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=buscar-usuario',
            success: function (_data) {
                //alert(_data.valido); 
                valido = _data.valido
                if (valido) {
                    
                    $_html = '<input type="text" name="cedula" id="cedula" value="' + _data.datos.cedula + '"disabled/>'
                    $_html += '<input type="text" name="nombre" id="nombre" value="' + _data.datos.nombre + '"disabled/>'
                    $_html += '<input type="button" name="btnEliminar" id="btnEliminar" class="eliminar" value="Eliminar Registro"/>'
                    $('#frmEliminar').append($_html);

                } else {
                    var dialog = new Messi(
                            'El usuario no existe.',
                            {
                                title: 'Error al realizar Usuario.',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );
                }

            }
        })
    }//fin Login

    function ActualizarUsuario() {
        $_form = $('#frmActualizar');
        //Obtener el valor de un input desde jquery
        $_cedula_busqueda = $('#buscarcedula').val();
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=modificar-usuario&cedula_busqueda=' + $_cedula_busqueda,
            success: function (_data) {
                valido = $.parseJSON(_data);
                if (valido) {
                    var dialog = new Messi(
                            'El registro se ha ingresado correctamente.',
                            {
                                title: 'Informacion de Registro.',
                                titleClass: 'anim info',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );

                } else {
                    var dialog = new Messi(
                            'No se registro correctamente.',
                            {
                                title: 'Error al realizar Usuario.',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );
                }
            }
        })
    }//fin Login


    function EliminarUsuario() {
        $_form = $('#frmEliminar');
        //Obtener el valor de un input desde jquery
        $_cedula_busqueda = $('#buscarcedula').val();
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=eliminar-usuario&cedula_busqueda=' + $_cedula_busqueda,
            success: function (_data) {
                valido = $.parseJSON(_data);
                //alert(_data.valido);
                if (valido) {
                    var dialog = new Messi(
                            'El registro se ha eliminado correctamente.',
                            {
                                title: 'Informacion de Registro.',
                                titleClass: 'anim info',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );

                } else {
                    var dialog = new Messi(
                            'No se ha eliminado el registro correctamente.',
                            {
                                title: 'Error al realizar Usuario.',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );
                }
            }
        })


    }

}) //fin de jquery