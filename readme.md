<p align="center"><img src="https://i.imgur.com/2EC8CN8.png"></p>


## El proyecto sintesis

En este proyecro se ha realizado un crud con login, registro y recuperacion de contraseñas, via mailtrap, el cual cuenta con una seccion empleados; donde podemos agregar uno nuevo o en caso de que ya exista/n alguno/s editarlos o borrarlos. Los mismo se visualizan en una tabla paginada de a 5 la cual posee un buscador en tiempo real, hecho en JavaScript, para filtrar por el campo que querramos. En la segunda seccion podemos agregar, editar o eliminar los distintos roles que pueden ocupar los empleados. Cada seccion cuenta con controles de errores y mensajes para mejorar la experiencia del ususario.

## Proceso de instalacion

	1-Clonamos el reposositorio (git clone https://github.com/G-Miralles/EFI_PHP2020.git)
	2-Instalamos el manejador de paquete composer (composer install)
	3-Ahora creamos el schmema para DB y configuramos en el archivo .env, que esta dentro del proyecto, las credenciales(DB_DATABASE, DB_USERNAME y DB_PASSWORD)
	4-Ahora realizamos las migraciones → php artisan migrate 
	5-Corremos el proyecto → php artisan serve

## Endpoint disponibles de la API

•Obtener usuarios [GET]
	- http://127.0.0.1:8000/api/users
	
•Obtener empleados [GET]
	- http://127.0.0.1:8000/api/empleados

•Obtener roles [GET]
	- http://127.0.0.1:8000/api/roles
