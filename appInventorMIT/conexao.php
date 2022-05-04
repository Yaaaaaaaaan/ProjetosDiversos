<?php
$host="localhost";
$usuario="root";
$senha="";
$banco="testedb";

$dbcon= new MySQLi("$host","$usuario","$senha","$banco");

if($dbcon-> connect_error){
echo "Erro na conexão.";	
}else{}
?>