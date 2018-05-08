<!DOCTYPE html>
<html>
<head>
	<title>Practica 2</title>
</head>
<body>

<?php

//-----Ejercicio 1 ---------
echo '---Ejercicio 1--- <br><br>';

$numeros = array(8,7,2,3,1,6,5,0,9,3,2,5);
echo 'Array: ';	
for($i = 0; $i < count($numeros); $i++){
	echo $numeros[$i];
}
?> <br><br> <?php

$asc = $numeros;
sort($asc);
//Orden Ascendente
echo 'Ascendente: ';	
for($i = 0; $i < count($asc); $i++){
	echo $asc[$i];
}
?> <br><br> <?php

//Orden Descendente
$des = $numeros;
rsort($des);
echo 'Descendente: ';
for($i = 0; $i < count($des); $i++){
	echo $des[$i];
}

?>

</body>
</html>