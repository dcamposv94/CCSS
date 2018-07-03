$(function (){

    
    
    /**********LISTENERS***********/
    
    $("#btnLogin").click(function()//Prefijos: "." es para clases, "#" es para un elemento
    {
      $(".loader").addClass("on");
       Login();
       $(".loader").addClass("off");
    });
    
    /**********FUNCIONES***********/
    
    function Login()
    {
        $_form=$("#frmLogin");
       $.ajax(
       {
        type: 'post',
        dataType: 'json', //El tipo de dato que se indica para enviar los datos
        url: 'procesar.php', //Llamado asincrono de php
        data: $_form.serialize() + '&accion=login', //Envia el paquete de los datos al cliente
        success: function(data)
        {
            if(data.valido)
            {
                window.location="menu-principal.php"//********CREAR MENU PRINCIPAL***********
            }else
            {
                alert("Datos incorrectos. Vuelva a intentarlo.")
            }
        }
       });
    }
})