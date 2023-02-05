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
<?php  /*Abrimos php */
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$user = $_POST['user'];
$habilidad = $_POST['ingles'];
$sexo = $_POST['sexo']; /*Con el método POST especificado en nuestro formulario.html
declaramos una variable global llamada 'sexo', donde la igualaremos usando $_POST para especificar
que los valores vienen del formulario que usa este método, y lo que irá entre los corchetes será el 'name' que
le asignamos al input de nuestros campos, este irá entre comillas simples, porque así se declara sintácticamente.
De esta manera, estamos diciéndole a nuestro programa que la variable global $sexo será igualada a los datos que
el usuario haya especificado, los cuales tendrán un valor etiquetado y especificado previamente en nuestro código con
el atributo name="'0000", en este caso, 'sexo' es el name asignado en el formulario.html*/
 if ($sexo == 'femenino') { /*Especificamos en nuestro condicional que si la variable global es idéntica a el valor previamente
    definido en el formulario a la hora de seleccionar una opción, entonces ejecutará una opción*/

echo "Bienvenida " . $_POST['nombres'] . " " . $_POST['apellidos'] . " tu usuario es " . $_POST['user'] . " esperamos que disfrutes de nuestras noticias al día <br>";
 } /*La instrucción para el caso de las mujeres 
 es notificarle una bienvenida al usuario mediante un texto concatenado con 
 los valores pereviamente digitados para notificarle que esos fueron sus datos 
 y que se ha registrado con éxito. */

/*En caso de que no se cumpla esa condición*/

 else { /*De no tratarse de una mujer, sino de un hombre; procedemos a cambiar la "Bienvenida", por "Bienvenido",
    concatenando de la misma manera los datos que previamente el usuario llenó en el formulario.html */
    echo "Bienvenido " . $_POST['nombres'] . " " . $_POST['apellidos'] . " tu usuario es " . $_POST['user'] . " esperamos que disfrutes de nuestras noticias al día <br>";
 }
 /* Insertar valores en la BD mediante INSERT INTO usando MYSQL y PHP MY ADMINN*/
 $insertar = "INSERT INTO suscripcion ".  /* En la tabla suscripción*/
               "( nombres, apellidos, email, user, sexo, habilidades) "."VALUES ".  /* Insertar valores en los campos*/
               "('$nombres', '$apellidos', '$email','$user','$sexo','$habilidad')";  
if ($mysqli->query($insertar)){ /* Ejecuta la sentencia */
  echo "suscripcion realizada";  /*notificar al usuario*/
} else {
  echo "Error: " . $insertar . "<br>" . $mysqli->error;
}

echo "<br>"; /*Salto de linea*/
echo "Estos son los usuarios registrados actualmente<br>"; /*Una mensaje para el usuario*/
echo "<br>";
echo "<br>";
?> <!--Cerramos php-->
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