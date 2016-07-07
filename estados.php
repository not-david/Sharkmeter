<?php
if (!empty($_GET['callback']))
{
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	//$host = "190.143.30.11";
	//$user = "cristian";
	//$psw = "12345";
	//$DB = "sensores";
	$host = "localhost";
	$user = "root";
	$psw = "";
	$DB = "sensores";

	$conexion = mysql_connect($host,$user,$psw);
	mysql_select_db($DB, $conexion);

	$query = "SELECT * FROM estados ORDER BY id DESC LIMIT 1";
	$consulta = mysql_query($query, $conexion) or die(mysql_error());
	$ncolumns = mysql_num_fields($consulta);	

	$fila = mysql_fetch_array($consulta);
	$estado = $fila["estados"];

	$data = array('respuesta_estado' => $estado);
	echo $_GET['callback']."(".json_encode($data).")";
}

?>
