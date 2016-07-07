<?php
    $host = "127.7.143.130";
    $user = "root";
    $psw = "chemoteamo123";
    $DB = "sensores";

    $conexion = mysql_connect($host,$user,$psw);
     mysql_select_db($DB, $conexion);
         $DT = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']-5*3600+10*3600);
	$DTa=date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']-5*3600-15*60+10*3600);



//$sql = "INSERT INTO gprs (idnew_table,indice)
//VALUES ('".$_GET['id']."','".$_GET['username']."')";
	$c=10;
	$to=floatval($_GET['tem'])/$c;
	$to=round($to);
	$ho=floatval($_GET['hum'])/$c;
	$ho=round($ho);
	$ro=floatval($_GET['rad'])*3000/(1023*1.67);
	$ro=round($ro);
	$vo=floatval($_GET['vin']);
	$vo=round($vo,1);

	$t1=floatval($_GET['tem1'])/$c;
	$t1=round($t1);
	$h1=floatval($_GET['hum2'])/$c;
	$h1=round($h1);
	$r1=floatval($_GET['rad3'])*3000/(1023*1.67);
	$r1=round($r1);
	$v1=floatval($_GET['vin4']);
	$v1=round($v1,1);

$sql = "INSERT INTO datosmet (Temp,Hum,Rad,ane,bateria,LATITUD,LONGITUD,TIEMPO)
VALUES ('".$to."','".$ho."','".$ro."','".$vo."','".$_GET['time']."','".$_GET['time']."','".$_GET['time']."','".$DTa."')";

$sql2 = "INSERT INTO datosmet (Temp,Hum,Rad,ane,bateria,LATITUD,LONGITUD,TIEMPO)
VALUES ('".$t1."','".$h1."','".$r1."','".$v1."','".$_GET['time']."','".$_GET['time5']."','".$_GET['time5']."','".$DT."')";


//$sql = "INSERT INTO datosmet (Temp,Hum,Rad,ane,LATITUD,LONGITUD,TIEMPO)
//VALUES ('25','25','25','25','25','25','25')";



$consulta = mysql_query($sql, $conexion) or die(mysql_error());
$consulta2 = mysql_query($sql2, $conexion) or die(mysql_error());
////$query = $_GET['tem'];

//echo $consulta;
//echo $query;
?>
