## Sockets

Prerequisitos

- composer
- Node
- Redis


## Instrucciones para ejecutar

- Clonar proyecto con `git clone https://github.com/FernandoMon/sockets.git`
- Copiar el archivo .env
- Utilizar el comando `cd sockets` para acceder a la carpeta del proyecto
- Utilizar el comando `composer install`
- Utilizar el comando `copy .env.example .env`
- *Abrir el archivo .env creado con el comando anterior y cambiar el nombre de la base de datos (DB_DATABASE) al correspondiente, el nombre de usuario (DB_USERNAME) y la contraseña (DB_PASSWORD). Agregar las siguientes variables al archivo BROADCAST_DRIVER=redis, QUEUE_CONNECTION=redis, REDIS_CLIENT=predis*. 
- Utilizar el comando `php artisan key:generate`
- *Utilizar el comando `php artisan migrate`*
- Utilizar el comando `npm install`
- Utilizar el comando `npm run dev`
- Utilizar el comando `npm install -g laravel-echo-server` (este comando se puede ejecutar desde cualquier directorio)
- Iniciar servidor de redis ejecutando `redis-server` y luego `redis-cli`
- Utilizar el comando `laravel-echo-server start`
- Utilizar el comando `php artisan queue:listen --tries=1`
- una vez ejecutado lo anterior la aplicación debería estar funcionando, probar con `php artisan serve`
