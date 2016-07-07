<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	

	$host = "localhost";
	$user = "root";
	$psw = "";
	$DB = "Databass";

	$conexion = mysql_connect($host,$user,$psw);
	mysql_select_db($DB, $conexion);
	//$query = "SELECT * FROM ".$_GET["username"]." ORDER BY id DESC LIMIT 1";
	
	//$query = "SELECT * FROM ".$_GET['username']." ORDER BY idMedida DESC LIMIT 1";
	$query = "SELECT * FROM Measurements ORDER BY idMeasurements DESC LIMIT 1";
	//$query = "SELECT * FROM sensorpi ORDER BY idMedida DESC LIMIT 1";

	$consulta = mysql_query($query, $conexion) or die(mysql_error());
    $ncolumns = mysql_num_fields($consulta);	
    //echo $ncolumns;
    // $nombress= mysql_field_name($consulta,4);  

	$fila = mysql_fetch_array($consulta);
  	for($i=0; $i < $ncolumns; $i++)
  	{
      $vecto[$i] = $fila[$i];
      $nombress[$i]= mysql_field_name($consulta,$i);
	}


$dataapp = array('etiquetas' => $nombress, 'valores' => $vecto);
echo $_GET['callback']."(".json_encode($dataapp).")";
?>
