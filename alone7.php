<?php



//$host = "190.143.30.11";
//$user = "cristian";
//$psw = "12345";
//$DB = "sensores";
$host = "localhost";
    $user = "root";
    $psw = "";
    $DB = "Databass";

$conexion = mysql_connect($host,$user,$psw);
mysql_select_db($DB, $conexion);

//$query = "select * from ".$_GET['username']." where (TIEMPO between '".$_POST['valor1']." ".$_POST['valor3']."' and '".$_POST['valor2']." ".$_POST['valor4']."')";
//$tablat=$_POST['tabla'];

/*
if(!isset($_COOKIE["senso"])) {
     
} else {
      $tablat=$_COOKIE["senso"];
}
*/

$query = "select * from Measurements where (Date between '".$_GET['valor1']." ".$_GET['valor3']."' and '".$_GET['valor2']." ".$_GET['valor4']."') order by idMeasurements desc";

$consulta = mysql_query($query, $conexion) or die(mysql_error());
$ncolumns = mysql_num_fields($consulta);	
$ncolumns = $ncolumns;
        

for($i=0; $i < $ncolumns; $i++){
      $nombress[$i]= mysql_field_name($consulta,$i);
} 

//	$query = "select * from ".$tablat." order by id desc limit 10";
//	$consulta = mysql_query($query, $conexion) or die(mysql_error());
$nfiles = mysql_num_rows($consulta);

for ($j=0; $j < $nfiles; $j++){

    $fila = mysql_fetch_array($consulta);

    for($i=0; $i < $ncolumns; $i++){
      
      $dta[$i] = $fila[$i];
      
    }
    //echo $dta;
    $bigdata[$j]=$dta;
    // echo $dta[2];
}


// --------------------------------- Estadisticos ----------------------------------------------



$resultado['enviado'] = $_GET; 
$resultado['respuesta'] = 'Gracias por sus datos '.$_GET['valor1'].', le llamaremos al '.$_GET['valor2'].' en horario de '.$_GET['valor3']; 
//$nom=array(array(54,46,43),array(34,16,13));
$nom = $bigdata;
$resultado['hologram'] = $nom;
$resultado['nomes'] = $nombress;
//$resultado['minimo']=$vecto2;
//echo json_encode($resultado);
 
if(isset($_GET['callback'])){  
  echo $_GET['callback'].'('.json_encode($resultado).')';
}
else {
  echo json_encode($resultado);
}


?>
