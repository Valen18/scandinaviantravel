# Prueba técnica de Scandinavian Travels para Full Stack Developer por Valentín Ayesa

## Procedimiento de puesta en marcha:

Clonar el repositorio

    https://github.com/Valen18/scandinaviantravel

Una vez clonado, en un terminal ejecutar los siguientes comandos dentro de la carpeta del proyecto:

    composer install 

    npm install

A continuación renombre el archivo ".env.example" a ".env" y configura los datos de la base de datos.
En mi caso:

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=scandinavian
	DB_USERNAME=root
	DB_PASSWORD=ASDijdnm235!
	
Todo lo demás, déjalo por defecto en este ejercicio.

El siguiente paso es ejecutar los siguientes comandos:

    php artisan key:generate 

    php artisan storage:link

Ahora ejecuta las migraciones y los seeders con los siguientes comandos desde la consola (siempre en el directorio del proyecto):

    php artisan migrate && php artisan db:seed

Cuando termine necesitarás ejecutar en la consola:

    npm run dev

Y abrir una nueva consola en el directorio del proyecto para ejecutar:

    php artisan serve

Esto ejecutará el servidor de desarrollo Vite y a la vez el servidor Artisan nativo de Laravel.
A continuación podrá acceder a la aplicación desde la url que indique la consola, normalmente: .

    http://127.0.0.1:8000/

## Procedimiento ejecutado para la creación del proyecto.

1.- Instalación Laravel y Tall

    composer create-project laravel/laravel scandinaviantravel
    composer require livewire/livewire laravel-frontend-presets/tall
    php artisan ui tall
    npm install
    npm run dev
    php artisan serve

2.- Creación de los modelos, controladores y migraciones

    php artisan make:model Car -cmsf
    php artisan make:model Author -cmsf
    php artisan make:model Post -cmsf
    php artisan make:model Location -cmsf
    php artisan make:model Image -m (solo la migración y el modelo)

3.- Crear tablas y llenar con datos de ejemplo

    php artisan migrate
    php artisan db:seed --class=CarSeeder
    php artisan db:seed --class=AuthorSeeder
    php artisan db:seed --class=PostSeeder
    php artisan db:seed --class=LocationSeeder

4.- Crear componente livewire

    php artisan make:livewire ImageGallery
