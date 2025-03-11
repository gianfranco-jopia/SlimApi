# SlimApi

Requisitos del Proyecto:


# Versión de PHP:
Debes tener PHP 8.1.10 o superior. Para gestionar fácilmente la versión de PHP, puedes utilizar Laragon, que permite manejar esto de manera sencilla.

Instalación de Composer:
Asegúrate de tener Composer instalado, ya que se utilizará para la instalación de dependencias y ejecución de comandos.


# Instalación de Slim Framework:
Para instalar Slim Framework, ejecuta el siguiente comando en la terminal dentro del directorio del proyecto,si ya lo tienes instalado, puedes omitir este paso. 
composer require slim/slim "^4.0" slim/psr7


# Instalación de Middleware para CORS
Para manejar las solicitudes CORS correctamente, instala el middleware con el siguiente comando: composer require tuupola/cors-middleware --with-all-dependencies
esto instalará todas las dependencias necesarias para evitar posibles errores de compatibilidad.



# Credenciales de Acceso
Administrador:
Email: admin@testexample.com
Contraseña: 123

Usuario Estándar:
Email: user@testexample.com
Contraseña: password

Una vez autenticado, podrás acceder a la sección donde se listan los datos obtenidos de la API externa.

# Descripción del Proyecto
El proyecto está levantado en Laragon y contiene un sistema de login con PHP que permite acceder a la página donde se listan los datos de la API.