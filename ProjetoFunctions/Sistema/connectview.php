<?php

$link= mysqli_connect("127.0.0.1", "root", "", "commerce");

if(!$link){
	echo "Erro: Sem conexão com o servidor MySQL. " . PHP_EOL;
	echo "Depurando Erro: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
?>