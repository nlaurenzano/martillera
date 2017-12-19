# martillera


contacto@silmarpropiedades.com 
silmarpropiedades@gmail.com
Instagram: Silmarpropiedades
https://www.instagram.com/silmarpropiedades/
15 5148 7999


#1044 - Acceso negado para usuario: 'cpses_siy61wzccn'@'localhost' para la base de datos 'silmarpropiedades'

silmarpr_DB
silmarpr_admin


Nombre de usuario de FTP: silmarpr
Servidor FTP: ftp.silmarpropiedades.com
Puerto FTPS explícito de FTP &:  21

Egresadosuai!


ftp.silmarpropiedades.com/home/silmarpr
ftp.silmarpropiedades.com/home/silmarpr/admin


170.78.74.12:21
admin@silmarpropiedades.com
Apocalypsh1t
{zB2pCK9Ml=@


Error al recuperar el listado del directorio




- Login			OK
	- Hacerlo funcionar como está, con la clave almacenada en DB.				OK
	- Modificarlo para que se genere el hash al almacenar en DB y validar.		OK
- Cambiar función del botón "Ver Todo" de la página inicial. Debe llevar al listado (botón buscar, sin filtro).	OK
- Pantallas admin. Agregar acciones al listado de resultados. 		OK
	Se administra desde ahí. 										OK
	Se mantienen los filtros, pero podría ocultarse el form de contacto, o reemplazarlo por alguna acción útil para el admin.

- Validaciones carga
	

- Mail
	- Ver que funcione el form
	- Agregar form en resultados
	- Usar una casilla que no sea mía
- Clickear algo con JS para que se arreglen las imágenes destacadas.
- Filtro hardcodeado: La cantidad de ambientes debe traerse de la DB. Obtener la cantidad de ambientes de todos los registros y elminar repeticiones de la lista (Unique).
- Logo en la solapa del navegador
- Paginar lista de resultados.
- Cambiar donde diga "Silvana" o "SILMAR" por un texto traído de DB.


- Shit! Fucking shit! No puedo guardar saltos de línea en DB.
	Tengo que ver de limpiar el texto al almacenar o corregirlo (help me Google!).




<button type="button" onclick="SendContactEmail()" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg"><?=get_Text('sendButtonLabel')?> <i class="ion-android-arrow-forward"></i></button>













ALGO PARA DESPUÉS
***********************************************************************************************

<script src="path/to/jquery.js"></script>
<script src="path/to/bootstrap.js"></script>
<script src="path/to/bootstrap-confirmation.js"></script>

<script src="./js/bootstrap-confirmation.js"></script>

$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
});



<button class="btn btn-default" data-toggle="confirmation" data-singleton="true" data-popout="true">Confirmation 1</button>
<button class="btn btn-default" data-toggle="confirmation">Confirmation 1</button>


title
singleton
popout
***********************************************************************************************



Buenas tardes,
Estamos tratando de crear nuestro sitio y no nos es posible crear una base de datos en phpmyadmin.
En prime lugar, no está la opción disponible en el navegador. Intentamos crearla con una consulta SQL y obtuvimos el siguiente mensaje de error:

#1044 - Acceso negado para usuario: 'cpses_siy61wzccn'@'localhost' para la base de datos 'silmarpropiedades'

El usuario con el que estamos registrándonos es silmarpr, que es el único que tenemos.