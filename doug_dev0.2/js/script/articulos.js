$(function () {
    /*==== LISTENER =====*/
    $('#btnRegistrar').click(function (e) {
         $('.loader').addClass('activo');
       //Primero valido los campos del formulario
        var form_valido = ValidarFormularioArticulo();

        if (form_valido.length > 0) {
            //alert(form_valido);
            var dialog = new Messi(
                    'Los siguientes campos son obligatorios' + ' ' + form_valido,
                    {
                        title: 'Error al Registrar Articulo.',
                        titleClass: 'anim error',
                        buttons: [{id: 0, label: 'Close', val: 'X'}]
                    }
            );
        } else {
            Registrar();
        }

    });
       

    $('#btnBuscaArticulo').click(function (e) {
        BuscaArticulo();
         $('#frmActualizarArticulo').empty();
          $('#frmActualizarArticulo').removeClass('lleno');
    });

    $('#btnBuscaArticuloEliminar').click(function (e) {
        BuscaArticuloEliminar();

    });
    
    $('#btnConsultaArticulo').click(function (e) {
        BuscaArticuloConsulta();
    });

    //se utiliza la funcion 'on' cuando agregamos una etiqueta html
    // con jquery y necesitamos agregarle un evento
    $(document).on('click', '.actualizar', function (e) {
        ActualizarArticulo();
    });

    $(document).on('click', '.eliminar', function (e) {
        EliminarArticulo();
    });

  /*===== FUNCIONES ====*/
    function Registrar() {
        $_form = $('#frmArticulo');
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=agregar-articulo',
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
    }//fin Registrar
    
    //Funcion Valida los campos del formulario Articulo
    function ValidarFormularioArticulo() {
        var vacios = new Array();
        if ($("#codigo").val().length < 1) {
            vacios.push("codigo");
        }
        if ($("#marca").val().length < 1) {
            vacios.push("marca");
        }
        if ($("#descripcion").val().length < 1) {
            vacios.push("descripcion");
        }
         if ($("#precio").val().length < 1) {
            vacios.push("precio");
        }
         if ($("#cantidad").val().length < 1) {
            vacios.push("cantidad");
        }
        return vacios;
    }//fin ValidarFormulario

    function BuscaArticulo() {
        if ($('#frmActualizarArticulo').hasClass("lleno")) {
            alert('ya tiene datos');
        } else {
            $_form = $('#frmArticulo');
            $.ajax({
                type: 'post',
                dataType: "json",
                url: 'funciones.php',
                data: $_form.serialize() + '&accion=buscar-articulo',
                success: function (_data) {
                    //alert(_data);
                    $_html = '<input type="text" name="codigo" id="codigo" value="' + _data.datos.codigo + '"/>'
                    $_html += '<input type="text" name="marca" id="marca" value="' + _data.datos.marca + '"/>'
                    $_html += '<input type="text" name="descripcion" id="descripcion" value="' + _data.datos.descripcion + '"/>'
                    $_html += '<input type="text" name="precio" id="precio" value="' + _data.datos.precio + '"/>'
                    $_html += '<input type="text" name="cantidad" id="cantidad" value="' + _data.datos.cantidad + '"/>'
                    $_html += '<input type="button" name="btnActualizar" id="btnActualizar" class="actualizar" value="Actualizar Registro"/>'
                    $('#frmActualizarArticulo').append($_html);
                    $('#frmActualizarArticulo').addClass('lleno');
                }
            })

        }//else

    }//fin Login

    function BuscaArticuloConsulta() {
        if (!$('#frmActualizarArticulo').hasClass("lleno")) {

            $_form = $('#frmArticulo');
            $.ajax({
                type: 'post',
                dataType: "json",
                url: 'funciones.php',
                data: $_form.serialize() + '&accion=buscar-articulo',
                success: function (_data) {
                    $_html = '<input type="text" name="codigo" id="codigo" value="' + _data.datos.codigo + '"disabled/>'
                    $_html += '<input type="text" name="marca" id="marca" value="' + _data.datos.marca + '"disabled/>'
                    $_html += '<input type="text" name="descripcion" id="descripcion" value="' + _data.datos.descripcion +'"disabled/>'
                    $_html += '<input type="text" name="precio" id="precio" value="' + _data.datos.precio + '"disabled/>'
                    $_html += '<input type="text" name="cantidad" id="cantidad" value="' + _data.datos.cantidad + '"disabled/>'
                    
                    $('#frmActualizarArticulo').append($_html);
                    $('#frmActualizarArticulo').addClass('lleno');
                }
            })

        }//else

    }//fin Login

    function BuscaArticuloEliminar() {
        $_form = $('#frmArticulo');
        $.ajax({
            type: 'post',
            dataType: "json",
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=buscar-articulo',
            success: function (_data) {
                //alert(_data.valido); 
                valido = _data.valido
                if (valido) {
                    
                    $_html = '<input type="text" name="codigo" id="codigo" value="' + _data.datos.codigo + '"disabled/>'
                    $_html += '<input type="text" name="marca" id="marca" value="' + _data.datos.marca + '"disabled/>'
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

    function ActualizarArticulo() {
        $_form = $('#frmActualizarArticulo');
        //Obtener el valor de un input desde jquery
        $_codigo_codigo = $('#buscarcodigo').val();
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=modificar-articulo&codigo_busqueda=' + $_codigo_busqueda,
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


    function EliminarArticulo() {
        $_form = $('#frmEliminar');
        //Obtener el valor de un input desde jquery
        $_codigo_busqueda = $('#buscarcodigo').val();
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=eliminar-articulo&codigo_busqueda=' + $_codigo_busqueda,
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