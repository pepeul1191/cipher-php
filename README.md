# Cipher- PP

### Tecnologías

+ PHP (5.3+)
+ SQLite3
+ Composer

### Instalación - Despliegue

 	$ composer update

### Para recargar el autoload de clases:

 	$ composer dump-autoload -o

 Thanks/Credits

    Pepe Valdivia: developer Software Web Perú [http://softweb.pe]

### Descipción

Servicio web desarrollado en PHP usando el framework FlightPHP, con patrones de diseño front-controller y distpacher y la interfaz de Idiorm para interactuar con la base de datos.

### Rutas

+ get 'key', to: 'cipher#key'
+ post 'encode', to: 'cipher#encode'
+ post 'decode', to: 'cipher#decode'

### Rutas - Descripción

#### [URL] + key

<b>Objetivo(s)</b>

Devolver un hash key.

<b>Método HTTP</b>

+ GET

<b>Parámetros</b>

+ Argumentos en la url : ninguno
+ Query Params : ninguno 

<b>Formato de respuesta OK</b>

JSON string de la lista de usuarios.

> String[13]

<b>Formato de respuesta alternativo </b>

+ No existe

---

#### [URL] + encode

<b>Objetivo(s)</b>

Generar un valor encriptado en función a una clave y texto.

<b>Método HTTP</b>

+ POST

<b>Parámetros</b>

+ Argumentos en la url : ninguno
+ Query Params : key, texto

<b>Formato de respuesta OK</b>

Devuelve un texto encriptado

> http://localhost/cipher-php/encode?key=LLnYx2dv3iwYo&texto=pepe
	GeUyi7Q73FCX8UMgjX8KTcZQLanwV5gKwYELBQDSpmc=

<b>Formato de respuesta alternativo </b>

+ No existe

---

#### [URL] + decode

<b>Objetivo(s)</b>

Devolver el valor desencriptado en función a una clave y texto encriptado.

<b>Método HTTP</b>

+ POST

<b>Parámetros</b>

+ Argumentos en la url : ninguno
+ Query Params : key, texto

<b>Formato de respuesta OK</b>

Devuelve un texto desencriptado

> http://localhost/cipher-php/decode?key=LLnYx2dv3iwYo&texto=GeUyi7Q73FCX8UMgjX8KTcZQLanwV5gKwYELBQDSpmc=
	pepe

<b>Formato de respuesta alternativo </b>

+ No existe

--- 

#### Fuentes
	
Framework FlightPHP :

+ http://flightphp.com/

Composer :
+ http://phpenthusiast.com/blog/how-to-autoload-with-composer
