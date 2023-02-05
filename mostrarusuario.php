<?php /*Conexión con la base de datos mysql*/ 
$mysqli = new mysqli("localhost", "root", "", "parcial2");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} 
?>
<!DOCTYPE html> <!--Abrimos con html5-->
<html> <!--abrimos html-->
<head> <!--abrimos head para hacer configuraciones que no verán los usuarios-->
<title>Comunidad Tech</title> <!---Titulo de la pagina-->
<link rel="stylesheet" type="text/css" href="style/style.css"> <!---Vinculamos con esto a la hoja de estilos .css-->
<meta charset="utf-8"> <!--Permite especificar los tipos de caracteres que podemos añadir al documento-->
</head> <!--Cerramos head-->
<body> <!--Abrimos el cuerpo-->
<div class="container"> <!---Creamos un contenedor principal donde almacenaremos y personalizaremos mejor-->
	<header>

		<h3> ¡Bienvenidos a comunidad tech Apure! </h3> <!---Titulo visible para el usuario-->
		<p>
			Estas son las creadoras del sitio web con las siguientes habilidades en 
			<ul> <!--Elaboramos una pequeña lista de ejemplo en nuestro header-->
				<li>Programación</li>
				<li>Diseño sencillo</li>
				<li>Informática</li>
			</ul> <!--Cerramos nuestra lista-->
		</p>
		<br>	<!--Hacemos salto de línea-->
		<i class="by">Hecho por: Dulce Zapata y Joskani Mendoza</i> <!--Dejamos nuestra firma-->
		<nav> <!-- Nuestra barra de navegación, con ella podemos dirigirnos a otras páginas de nuestro repositorio-->
			<ul>
				<li><a href="index.html">Inicio</a></li> <!--Conectamos nuestro website a la pagina principal-->
				<li><a href="formulario.html">Registrese aquí en nuestro newspaper</a></li> <!--conectamos nuestro website al formulario de registro-->
				<li><a href="#">Archivo de registro</a></li>
			</ul>
		</nav> <!--Cerramos nuestra barra de navegación-->
	</header> <!--Cerramos nuestro header-->

    
    <!--Abrimos nuestro php-->
    <div class="paginaprincipal"> <!--Asignamos la instrucción php dentro de uno de nuestros contenedores ya definidos-->
        <?php
echo "<br>"; /*Salto de linea*/
echo "Estos son los usuarios registrados actualmente<br>"; /*Una mensaje para el usuario*/
echo "<br>";
echo "<br>";
?>
<div class=bd> 
    <table>
        <tr>
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Usuario</th>
          <th>Sexo</th>
          <th>Habilidades</th>
        </tr>
        <?php /*abrimos php para nuestra tabla de mysql*/
        $consulta = $mysqli->query("SELECT * FROM suscripcion"); /*hace consulta a la tabla de base de datos, trayendo
        los valores y los resultados a ella*/
        while($fila = $consulta->fetch_assoc()){ /*Este while va a repetir el array hasta que no hayan mas resultados*/
          echo "<tr>"; /*mostrar nuestra tabla*/
          echo "<td>".$fila['id']."</td>"; /*Mostramos el campo id*/
          echo "<td>".$fila['nombres']."</td>"; /*Mostramos el campo nombre*/
          echo "<td>".$fila['apellidos']."</td>"; /*Mostramos el campo apellidos*/
          echo "<td>".$fila['email']."</td>"; /*Mostramos el campo email*/
          echo "<td>".$fila['user']."</td>"; /*Mostramos el campo user*/
          echo "<td>".$fila['sexo']."</td>"; /*Mostramos el campo sexo*/
          echo "<td>".$fila['habilidades']."</td>"; /*Mostramos el campo de habilidades*/
          echo"</tr>"; /*cerramos nuestra columna*/
        }
            
        ?> <!--Cerramos el php-->
      </table> <!--Cerramos la tabla-->

</div>
</div> <!--Cerramos el contenedor-->
</body> <!--Cerramos el cuerpo-->
</html> <!--Cerramos el html-->