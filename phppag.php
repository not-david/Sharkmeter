<?php

	$host = "190.143.30.11";
	$user = "cristian";
	$psw = "12345";
	$DB = "sensores";

	$conexion = mysql_connect($host,$user,$psw);
	mysql_select_db($DB, $conexion);

	//$query = "select * from ".$_GET['username']." order by idMedida desc limit 1";
	$query = "select * from sensorpi order by idMedida desc limit 1";
	$consulta = mysql_query($query, $conexion) or die(mysql_error());
    $ncolumns = mysql_num_fields($consulta);	
  

	$fila = mysql_fetch_array($consulta);
  	for($i=0; $i < $ncolumns; $i++){			
      $vecto[$i] = $fila[$i];
      $nombress[$i]= mysql_field_name($consulta,$i);
    } 

	$Lat = $fila['LATITUD'];
	$Long = $fila['LONGITUD'];

	//$query = "select * from ".$_GET['username']." order by idMedida desc limit 10";
	$query = "select * from sensorpi order by idMedida desc limit 10";
	$consulta = mysql_query($query, $conexion) or die(mysql_error());
	$nfiles = mysql_num_rows($consulta);

    for ($j=0; $j < $nfiles; $j++){
		$fila = mysql_fetch_array($consulta);
		for($i=0; $i < $ncolumns; $i++)
		{
			$dta[$i] = $fila[$i];
		}
		$bigdata[$j]=$dta;
	} 


?>

<script type="text/javascript">
	var Lat = <?php echo json_encode($Lat); ?>;
	var Long = <?php echo json_encode($Long); ?>;
    var vecto = <?php echo json_encode($vecto); ?>;
    var namess = <?php echo json_encode($nombress); ?>;	
	var Gdd = <?php echo json_encode($bigdata); ?>;

</script>

