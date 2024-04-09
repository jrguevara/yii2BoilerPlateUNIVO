<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="150px">
    </a>
    <a href="https://www.univo.edu.sv" target="_blank">
        <img src="https://www.univo.edu.sv/wp-content/uploads/2020/07/ISOLOGO-UNIVO-150x150.png">
    </a>
</p>    
    <h1 align="center">Yii 2 BoilerPlate UNIVO</h1>
   <br>

Proyecto creado en Yii2 con fines educativos para estudiantes de la materia Aplicacion de Frameworks Empresariales en la Universidad de Oriente UNIVO.

Este boilerplate esta basado en la plantilla Basica de Yii2 es una aplicación esqueleto de , para crear rápidamente proyectos pequeños.

Esta plantilla incluye las siguientes caracteristicas:

- Modulo de gestion de usuarios
- Modulo de gestion de roles
- Modulo de gestion de permisos
- Modulo de gestion de rutas
- Modo claro y oscuro
- Notificaciones
- Componente para subida de imagenes a Cloudinary
- Plantilla AdminLTE 3 (Bootstrap 4) - [https://adminlte.io](https://adminlte.io)
- Extensiones para Yii de Krajee - [https://demos.krajee.com](https://demos.krajee.com)
- Control de errores y excepciones
- Implementacion de Bitacora de eventos
- Archivo ENV para configuracion de variables de entorno
- Script de instalacion de base de datos

Para mas informacion sobre Yii2, por favor visite [http://www.yiiframework.com](http://www.yiiframework.com) o [

## ESTRUCTURA DE DIRECTORIOS

      assets/             contiene definiciones de activos
      components/         contiene clases de componentes personalizados
      config/             contiene configuraciones de la aplicación
      controllers/        contiene clases de controladores web
      database/           contiene archivos de migraciones de base de datos
      models/             contiene clases de modelos
      modules/            contiene modulos de la aplicacion
      runtime/            contiene archivos generados durante el tiempo de ejecución
      tests/              contiene varias pruebas para la aplicación básica
      vendor/             contiene paquetes de terceros instalados a través de Composer
      views/              contiene archivos de vista para la aplicación web
      web/                contiene el script de entrada y recursos web
      widgets/            contiene clases de widgets personalizados

## REQUERIMIENTOS

Este proyecto puede ser descargado y ejecutado en cualquier servidor web que soporte PHP 7.4, se recomienda el uso de XAMPP o WAMP para Windows, o LAMP para Linux o MAMP parac MacOS.

## CONFIGURACION

### Base de datos

Edita el archivo `config/db.php` con los datos reales, por ejemplo:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Cree una base de datos con el nombre que desee y luego utilice el script de instalacion de base de datos que se encuentra en la carpeta `database` para crear las tablas necesarias.

### Usuarios
El script de instalacion de base de datos crea un usuario con el rol de administrador con los siguientes datos:
- Usuario: admin
- Contraseña: 123456

Tambien se crea un usuario con el rol de usuario registrado con los siguientes datos:
- Usuario: usuario
- Contraseña: 123456

### Cloudinary
Para subir imagenes a Cloudinary, es necesario crear una cuenta en [https://cloudinary.com](https://cloudinary.com) y obtener las credenciales de la cuenta, luego crear el archivo `.env` en la raiz del proyecto con las variables de entorno y datos reales, por ejemplo:

```env
CLOUDINARY_CLOUD_NAME = 'tu_cloud_name'
CLOUDINARY_API_KEY = 'tu_api_key'
CLOUDINARY_API_SECRET = 'tu_api_secret'
```

## LICENCIA Y DISTRIBUCION

Este proyecto es de uso libre y puede ser distribuido y modificado por cualquier persona. Para mas informacion, por favor lea el archivo [LICENSE.md](LICENSE.md).
