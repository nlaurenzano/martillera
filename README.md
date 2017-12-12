# martillera



Silmarpropiedades@gmail.com



- Login
	- Hacerlo funcionar como está, con la clave almacenada en DB.
	- Modificarlo para que se genere el hash al almacenar en DB y validar.

password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

admin@test.com
$2y$10$xsoahb/1AbtrgR0N/.1rsOUb63AXjbtSU4ZgnxzavNGE9RputcyDW




//password_strength_check($clave, 8, 50, 1, 1, 1, 0)




INSERT INTO `usuarios`(`email`, `clave`, `nombre`, `rol`) 
VALUES
('admin@test.com','$2y$10$UZZoQ3ow44mOME2JeLbGdeMKXdB9z9Ibb6pSuD13aVdeEy9OQjc1K','aDMIN','ADMIN')



if (password_verify('rasmuslerdorf', $hash)) {
    echo '¡La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}


- Pantallas admin. Agregar acciones al listado de resultados. Se administra desde ahí. Se mantienen los filtros, pero podría ocultarse el form de contacto, o reemplazarlo por alguna acción útil para el admin.
- Filtro hardcodeado: La cantidad de ambientes debe traerse de la DB. Obtener la cantidad de ambientes de todos los registros y elminar repeticiones de la lista (Unique).
- Cambiar función del botón "Ver Todo" de la página inicial. Debe llevar al listado (botón buscar, sin filtro).
- Mail
	- Ver que funcione el form
	- Agregar form en resultados
	- Usar una casilla que no sea mía
- Validaciones carga
- Paginar lista de resultados.
- Logo en la solapa del navegador
- Logo del header debe ser un recurso compartido. Está repetido el código en cada achivo.




<?php 
session_start();
?>


<script type="text/javascript">
  //MostrarBotones();
  MostrarHeader('MostrarHeaderLogin');
  </script>

