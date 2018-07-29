$(function () {
    /*==== LISTENER =====*/

    $('#btnContinuarCompra').click(function (e) {
        AgregarProductos();
    });


    $('#btnFinalizarCompra').click(function (e) {
        FinalizarCompra();
    });

    /*===== FUNCIONES ====*/
    function AgregarProductos() {
        $_form = $('#formProductos');
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=agregar-productos',
            success: function (_data) {
                valido = $.parseJSON(_data);
                if (valido) {
                    window.location.replace('finalizar-compra.php');
                }
            }
        })
    }//fin AgregarProductos

    function FinalizarCompra() {
        $_form = $('#formProductos');
        $.ajax({
            type: 'post',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=finalizar-compra',
            success: function (_data) {
                valido = $.parseJSON(_data);
                if (valido) {
                    window.location.replace('finalizar-compra.php');
                }
            }
        })



//        var dialog = new Messi(
//                'Se ha realizado la compra exitosamente.',
//                {
//                    title: 'Informacion de Compra.',
//                    titleClass: 'anim info',
//                    buttons: [{id: 0, label: 'Close', val: 'X'}],
//                    callback: function (val) {
//                        window.location.replace('catalogo-productos.php');
//                    }
//                }
//        );

    }//fin FinalizarCompra

}) //fin de jquery