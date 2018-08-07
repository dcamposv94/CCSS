# CCSS
Proyecto Universidad Fidelitas: Sistema Indicador de Riesgo Bucodental (SIRB) de la CCSS
Descripción del proyecto
El sistema de Riesgo Bucodental (SIRB), es un instrumento de screening, para detectar el riego de padecer enfermedades bucodentales. Estos son métodos de análisis simples que se utilizan para la identificación o el descarte de patologías en pacientes, los cuales son aplicados para obtener una información rápida sobre esas patologías.

#Pre-requisitos 

Primeramente, debemos contactar con una computadora con sistema  operativo Windows apartir de las versiones XP.Seguidamente, se necesita conexion a internet y capacidad de memoria para la instalacion de los siguientes programas:
Netbeans version 8.1 y su respectivo JDK.Antes de instalar el IDE, debe tener instalado en el sistema la actualización XX de Java SE Development Kit (JDK) (versión XX.XX.XX) o la actualización XX  de JDK 8 o posterior. Si no tiene una instalación de JDK, no puede continuar con la instalación. Puede descargar la versión más reciente de JDK en http://java.sun.com/javase/downloads.
Para las opciones de descarga de PHP, Ruby y C/C++ puede instalar JRE en lugar de JDK. Sin embargo, si piensa usar cualquiera de las funciones de Java, necesitará JDK. Este sera el motor en donde implantaremos el codigo de dicho proyecto. 
Por otra parte, se requiere de XAMPP v3.2.2. Una vez descargado XAMPP. En Windows descomprimimos el archivo con 7zip pulsando sobre el archivo con el botón derecho. En el menú contextual que aparece elegimos 7zip y luego Extraer ficheros.
Con esta herramienta, logramos montar la base de datos en MYSQL la cual se conecta y es totalmente compatible con nuestro proyecto creado y manipulado en Netbeans. Ahora probamos el interfaz web de MySQL phpMyAdmin“pulsando en el menú de la izquierda Herramientas > phpMyAdmin o también escribiendo desde el navegador: http://localhost/phpmyadmin

#Paso a Paso: Instalaciones 

----->Netbeans<----------

Para instalar el software:

*Una vez finalizada la descarga, ejecute el instalador.
        El archivo del instalador de Windows tiene la extensión .exe. Haga doble clic en él para ejecutarlo.
        El archivo del instalador de las plataformas Solaris y Linux tiene la extensión .sh. En estas plataformas debe convertir los archivos del instalador en ejecutables mediante el siguiente comando: chmod +x <nombre-archivo-instalador>
*Para seleccionar las herramientas y tiempos de ejecución que se van a instalar, siga estos pasos en la página de bienvenida del asistente de instalación:
        Haga clic en Personalizar.
        En el cuadro de diálogo Personalizar la instalación, realice las selecciones.
        Haga clic en Aceptar.
*En la página de bienvenida del asistente para la instalación, haga clic en Siguiente.
*En la página del contrato de licencia, revise el contrato, marque la casilla de aceptación y haga clic en Siguiente.
*En la página de instalación de NetBeans IDE, siga estos pasos:
        Acepte el directorio de instalación predeterminado de NetBeans IDE o especifique otro directorio. Nota: el directorio de instalación debe estar vacío y el perfil de usuario que utilice para ejecutar el instalador debe disponer de permisos de lectura/escritura en dicho directorio.
        Acepte la instalación de JDK predeterminada para usarlo con NetBeans IDE o seleccione una instalación diferente en la lista desplegable. Si el asistente de instalación no encuentra una instalación de JDK compatible para usar con NetBeans IDE, no se instalará en la ubicación predeterminada. En este caso, especifique la ruta de un JDK instalado o cancele la instalación actual, instale la versión de JDK requerida y reinicie esta instalación.
        Haga clic en Siguiente.
*Si se abre la página de instalación de GlassFish v3, acepte el directorio de instalación predeterminado o especifique otra ubicación para la instalación.
    Si va a instalar Apache Tomcat: en la página de instalación, acepte el directorio de instalación predeterminado o especifique otra ubicación para la instalación.
    En la página de resumen, compruebe que la lista de componentes que se van a instalar es correcta y que dispone de espacio suficiente en el sistema para la instalación.
    Haga clic en Instalar para comenzar la instalación.
  
  
----->XAMPP<----------

1. Descarga

Las versiones con PHP 5.5, 5.6 o 7 se pueden descargar gratuitamente desde la página del proyecto Apache Friends.
2. Ejecutar el archivo .exe
Una vez descargado el paquete, puedes ejecutar el archivo .exe haciendo doble clic en él.


3. Desactivar el programa antivirus
Se recomienda desactivar el programa antivirus hasta que todos los componentes estén instalados, ya que puede obstaculizar el proceso de instalación.
4. Desactivar el UAC
También el control de cuentas de usuario (User Account Control, UAC) puede interferir en la instalación, ya que limita los derechos de escritura en la unidad de disco C:\. Para saber cómo desactivar temporalmente el UCA puedes dirigirte a las páginas de soporte de Microsoft.
5. Iniciar el asistente de instalación
Una vez superados estos pasos, aparece la pantalla de inicio del asistente para instalar XAMPP. Para ajustar las configuraciones de la instalación se hace clic en “Next”.
6. Selección de los componentes del software
En la rúbrica “Select components” se pueden excluir de la instalación componentes aislados del paquete de software de XAMPP. Se recomienda la configuración estándar para un servidor de prueba local, con la cual se instalan todos los componentes disponibles. Confirma la selección haciendo clic en “Next”.
7. Selección del directorio para la instalación
En este paso se escoge el directorio donde se instalará el paquete. Si se ha escogido la configuración estándar se creará una carpeta con el nombre XAMPP en C:\.
8. Iniciar el proceso de instalación
El asistente extrae los componentes seleccionados y los guarda en el directorio escogido en un proceso que puede durar algunos minutos. El avance de la instalación se muestra como una barra de carga de color verde.
9. Configurar Firewall
Durante el proceso de instalación es frecuente que el asistente avise del bloqueo de Firewall. En la ventana de diálogo puedes marcar las casillas correspondientes para permitir la comunicación del servidor Apache en una red privada o en una red de trabajo. Recuerda que no se recomienda usarlo en una red pública.
10. Cerrar la instalación
Una vez extraídos e instalados todos los componentes puedes cerrar el asistente con la tecla “Finish”. Para acceder inmediatamente al panel de control solo es necesario marcar la casilla que pregunta si deseamos hacerlo.

#Test

En este momento, todas las partes de codigo que tenemos se prueban desde la plataforma de netbeans en cuestion de demostracion que los metodos se estan empleando de la mejor manera. A medida que avanzamos ya podemos hacer mejoras en el codigo como implantacion de parte grafica que nos ayude a ver el resultado estetico que tendra nuestra pagina. 

#Versionamiento 
En el proyecto hemos definido colocar versiones en formato X.x.x en lo cual se puede identificar los avances pequenos en mejoras de codigo  seguidas de un punto a la version y en el caso de modificaciones grandes que nos afecten en la raiz del proyecto colocamos numeros consecutivos a la siguiente version. 

#Pasos antes de poner en Produccion
Creación de los documentos entregables y envío a de los mismos :
* Revisión de la aplicación por parte de la junta en los tres ámbitos siguientes:
* Cumplimiento de estándares de BBDD
* Cumplimiento de estándares J2EE
* Cumplimiento de estándares de Seguridad
* Si el paso anterior se supera con éxito, es decir, se validan estándares por parte de la
junta, se crea la base de datos en pruebas, se crean los roles de seguridad en el
single-sign-on (de pruebas) del Govern Balear, se crean los enlaces de pruebas en la
intranet/extranet y se despliega la aplicación en los servidores de pruebas (nunca
directamente en producción).
* Se notificará al usuario que hizo la petición de instalación de los posibles problemas
detectados o de la correcta instalación en pruebas de la aplicación, así como de los
detalles particulares de la misma.
* El responsable funcional o informático de la conselleria envía petición para asignar los
roles de seguridad de pruebas a los usuarios que testearan la aplicación
* El responsable del fichero de datos1 de la aplicación valida funcionalmente la versión
desplegada y envía una petición firmada a la junta para el pase a producción de la
versión.
* Se crea la base de datos en producción, se crean los roles de seguridad en el
single-sign-on del Govern Balear, se crean los enlaces de producción en la
intranet/extranet y se despliega la aplicación en los servidores de producción.
* Se notificará al usuario que hizo la petición de instalación de los posibles problemas
detectados o de la correcta instalación en producción de la aplicación, así como de los
detalles particulares de la misma.
* El responsable funcional de la conselleria o dirección general envía petición firmada por
el responsable del fichero (aplicación) para asignar los roles de seguridad a los usuarios
de producción
* Para los pases a producción será necesario especificar en el cuaderno de carga (apartado
Descripción de los cambios) el identificador del último CAI de preproducción, del que se
deberán tomar los ficheros EAR Nota: los pases a producción se realizarán siempre utilizando los
ficheros EAR instalados en preproducción.

#Autores
Lisbeth Lao 
Jessica Centeno
Melissa Carranza 
Douglas Campos

#Reconocimientos
En si nos inspiramos en la mejora de un servicio publico para el desarrollo de planes de salud. Con el objetivo de dar nuestro aporte desde nuestra area a zonas vulnerables de mal manejo de informacion en este caso en el area de salud bucodental. Esta de mas decir que nuestra mayor inspiracion es proveer una herramienta que sera de ayuda tanto en el dia a dia de los doctores y sus pacientes como en censos y posteriormente decisiones importantes apartir de informacion recolectada bajo nuestra plataforma. 
