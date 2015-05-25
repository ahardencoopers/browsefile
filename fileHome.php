<?php
require_once("myLib/myDb.php"); //Codigo para manejar conexion a base da datos.
require_once("myLib/myPw.php"); //Codigo para manejo de passwords.
require_once("myLib/myFs.php"); //Codigo para manejo de passwords.

noExpire();

if(haySesion())
{
	iniciarDirectorio();
}

if($_POST['nuevoDirectorio'] != "")
{
	cambiarDirectorio($_POST['nuevoDirectorio']);
}

if($_POST['regresarDirectorio'] == "true")
{
	cambiarDirectorio("..");
}


//Conexion a la base de datos
$conexion = conectarDb();

//Abrir encabezado de body y html
echo <<<OUT
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>browsefile</title>
		<meta name="viewport" content="width=device-width, initial scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/dotted.css">
	</head>
<body>
OUT;

//Codigo de PHP con HTML
echo <<<OUT

<nav class="navbar navbar-default">
	<div class="container-fluid">

		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">browsefile</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Log in</a></li>
				<li><a href="#">Sign up</a></li>
			</ul>
		</div>

	</div>
</nav>

<div class="container">
<div class="row">
<form action="fileHome.php" class="left-link important-link" method="post">
	<input type="hidden" name="regresarDirectorio" value="true">
	<input class="btn-link" type="submit" name="submitRegresar" value="Regresar una carpeta">
</form>

</div>
</div>

OUT;

mostrarArchivos();

//Javascript para bootstrap
echo <<<OUT

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

OUT;

//Cerrar encabezado de body y html 
echo <<<OUT
  </body>
</html>
OUT;

?>
