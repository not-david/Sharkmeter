<?php 
$gmtimenow = time() - (int)substr(date('O'),0,3)*60*60-18000; 
echo $gmtimenow . "\n"; 
echo 'Ahora:            '.date("d-m-Y h:i:s",$gmtimenow);
?> 