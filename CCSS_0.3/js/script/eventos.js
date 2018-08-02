$(function () {

    /*==== LISTENER =====*/
    $('#btnLogin').click(function (e) {
        $('.loader').addClass('activo');
        //Primero valido los campos del formulario
        var form_valido = ValidarFormulario();

        if (form_valido.length > 0) {
            //alert(form_valido);
            var dialog = new Messi(
                    'Los siguientes campos son obligatorios' + ' ' + form_valido,
                    {
                        title: 'Error al realizar Login.',
                        titleClass: 'anim error',
                        buttons: [{id: 0, label: 'Close', val: 'X'}]
                    }
            );
        } else {
            Login();
        }

    });

    $('.btnlogout').click(function(e) {
        e.preventDefault();
        Logout();
    })

    /*===== FUNCIONES ====*/
    function Login() {
 
        $_form = $('#frmLogin');
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'funciones.php',
            data: $_form.serialize() + '&accion=login',
            success: function (_data) {
                if (_data.valido) {                          
                    window.location = "menu-inicio.php";
                } else {
                    
                    var dialog = new Messi(
                            'Los datos de login son incorrectos, no coinciden.',
                            {
                                title: 'Error al realizar Login.',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Close', val: 'X'}]
                            }
                    );
                }
                $('.img-button').removeClass('loader');
                $('.loader').removeClass('activo');
            }
        })
    }//fin Login

    function Logout() {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'funciones.php',
            data: 'accion=logout',
            success: function (_data) {   
                var dialog = new Messi(
                        'Sessión ha sido finalizada.',
                        {
                            title: 'Finalizando Sesión.',
                            titleClass: 'anim info',
                            buttons: [{id: 0, label: 'Close', val: 'X'}],
                            callback: function (val) {                              
                                window.location.replace('index.php');
                            }
                        }
                );
            }
        })
    }//fin Login

    //Funcion Valida los campos del formulario
    function ValidarFormulario() {
        var vacios = new Array();
        if ($("#usuario").val().length < 1) {
            vacios.push("usuario");
        }
        if ($("#contrasena").val().length < 1) {
            vacios.push("contraseña");
        }
        return vacios;
    }//fin ValidarFormulario

}) //fin de jquery