
<div  id="top"></div>

  

<!--

  

*** Thanks for checking out the Best-README-Template. If you have a suggestion

  

*** that would make this better, please fork the repo and create a pull request

  

*** or simply open an issue with the tag "enhancement".

  

*** Don't forget to give the project a star!

  

*** Thanks again! Now go create something AMAZING! :D

  

-->

  

  

<!-- PROJECT SHIELDS -->

  

<!--

  

*** I'm using markdown "reference style" links for readability.

  

*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).

  

*** See the bottom of this document for the declaration of the reference variables

  

*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.

  

*** https://www.markdownguide.org/basic-syntax/#reference-style-links

  

-->

[![LinkedIn][linkedin-shield]][linkedin-url]

  

  

<!-- PROJECT LOGO -->

  

<h3 align="center">Inventario</h3>

  

  

<p align="center">

Projecto para evaluación de conocimientos, desarrollado en Laravel 8 con Jetstream y Livewire como Stack así como TailwindCSS para el framework de diseño.

</p>

  

<br  />

  

</div>

  

<!-- TABLE OF CONTENTS -->

  

<details>

  

<summary>Tabla de contenidos</summary>

  

<li><a  href="#built-with">Construido con</a></li>

  

<li><a  href="#getting-started">Comenzando</a></li>

  

<ul>

  

<li><a  href="#prerequisites">Pre-requisitos</a></li>

  

<li><a  href="#installation">Instalación</a></li>

  

<li><a  href="#contact">Contacto</a></li>

</ul>

</details>

  

  

### Construido con

  

* [Laravel](https://laravel.com)

  

* [Jetstream](https://jetstream.laravel.com)

  

* [TailwindCSS](https://tailwindcss.com/)

  

  

<p align="right">(<a  href="#top">volver arriba</a>)</p>

  

  

<!-- GETTING STARTED -->

  

## Comenzando

  
  

### Pre-requisitos

  

* Descargar e instalar [XAMPP](https://www.apachefriends.org/download.html) en su última versión con PHP 8.0

* Descargar e instalar [Node](https://nodejs.dev/download/) en su versión más reciente

* Agregar PHP a las variables de entorno, puedes seguir el siguiente [Tutorial](https://www.netveloper.com/php-variable-de-entorno-en-windows)

* Descargar e instalar [Composer](https://getcomposer.org/download/)

* Habilitar la libreria `GD` en XAMPP, puedes seguir el siguiente [Tutorial](https://www.youtube.com/watch?v=b5aAYE7s_vI)

* Crear un dominio virtual para la aplicación, puedes seguir el siguiente [Tutorial](https://www.youtube.com/watch?v=HzygRlPmYQc&t=182s&ab_channel=CodersFree)

  

* En base al tutorial del dominio virtual, añadir la siguiente ruta a este archivo `C:\Windows\System32\drivers\etc\hosts`

```sh

127.0.0.1 inventario.test

```

* Pegar las siguientes líneas al final del archivo `C:\xampp\apache\conf\extra\httpd-vhosts.conf`

```sh

NameVirtualHost *
<VirtualHost *>
DocumentRoot "C:\xampp\htdocs"
ServerName localhost
</VirtualHost>

<VirtualHost *>
DocumentRoot "C:\xampp\htdocs\inventario\public"
ServerName inventario.test
<Directory "C:\xampp\htdocs\inventario\public">
Options All
AllowOverride All
Require all granted
</Directory>
</VirtualHost>

```

  
  

  

### Instalación

  

1. Clonar el repositorio dentro de `C:\xampp\htdoc`

  

```sh

git clone https://github.com/Alexxlml/inventario.git

```

  

2. Instalar librerías Laravel

  

* Abrir la terminal (git bash, powershell o cmd) dentro o fuera de VSCode

* Navegar hasta la carpeta del proyecto

* Ejecutar el siguiente comando

  

```sh

composer update

```

  

3. Instalar librerías node

  

```sh

npm install

```

```sh

npm run dev

```

4. Crear la base de datos del proyecto

* Entrar a localhost en Chrome o Firefox

* Abrir PHPMyAdmin

* Crear una base de datos con el nombre: _" inventario "_

<br/>

5. Copiar el archivo `C:/xampp/htdoc/inventario/.env.example` pegarlo en el directorio raiz del proyecto

* Cambiar el nombre a .env

<br/>

  

6. Crear la llave de la aplicación con el siguiente comando

  

```sh

php artisan key:generate

```

7. Ejecutar las migraciones en la consola, situado en la ruta del proyecto

  

```sh

php artisan migrate --seed

```
* Se incluyen seeders con datos de prueba para la ejecución, si quieres ver los usuarios creados abre el archivo <br/> `C:\xampp\htdocs\inventario\database\seeders\UserSeeder.php`
<br/>

8. Abrir en Chrome o Firefox `inventario.test`

* Si quieres migrar nuevamente las tablas deberás ejecutar el siguiente comando
```sh

php artisan migrate:fresh --seed

```
  

  

<p align="right">(<a  href="#top">volver arriba</a>)</p>

  

<!-- CONTACT -->

  

## Contacto

  

  

Marco Alexis Zacarias Rubio - marcoalexiszacariasrubio@gmail.com

  

  

Enlace del proyecto: [https://github.com/Alexxlml/inventario](https://github.com/github_username/repo_name)

  

  

<p align="right">(<a  href="#top">volver arriba</a>)</p>

  
  

  

<!-- MARKDOWN LINKS & IMAGES -->

  

<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

  

[contributors-shield]:  https://img.shields.io/github/contributors/github_username/repo_name.svg?style=for-the-badge

  

[contributors-url]:  https://github.com/github_username/repo_name/graphs/contributors

  

[forks-shield]:  https://img.shields.io/github/forks/github_username/repo_name.svg?style=for-the-badge

  

[forks-url]:  https://github.com/github_username/repo_name/network/members

  

[stars-shield]:  https://img.shields.io/github/stars/github_username/repo_name.svg?style=for-the-badge

  

[stars-url]:  https://github.com/github_username/repo_name/stargazers

  

[issues-shield]:  https://img.shields.io/github/issues/github_username/repo_name.svg?style=for-the-badge

  

[issues-url]:  https://github.com/github_username/repo_name/issues

  

[license-shield]:  https://img.shields.io/github/license/github_username/repo_name.svg?style=for-the-badge

  

[license-url]:  https://github.com/github_username/repo_name/blob/master/LICENSE.txt

  

[linkedin-shield]:  https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555

  

[linkedin-url]:  https://www.linkedin.com/in/marcozr/

  

[product-screenshot]:  images/screenshot.png