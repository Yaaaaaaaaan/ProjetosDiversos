<?php 
include "conexao.php";

$nick=$_POST["nick"];
$senha=$_POST["senha"];

$sql= $dbcon->query("select * from TBlogin where nick='$nick' and senha='$senha'");

if(mysqli_num_rows($sql)>0){
echo "reg_erro";
}
	else{$sql= $dbcon->query("insert into TBlogin (nick, senha) values ('$nick','$senha')");
echo"reg_ok";}

?>