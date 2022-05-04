<?php 
include "conexao.php";

$nick=$_POST["nick"];
$senha=$_POST["senha"];

$sql= $dbcon->query("select * from TBlogin where nick='$nick' and senha='$senha'");

if(mysqli_num_rows($sql)> 0){
	echo "login_ok, ";
	while($dados=$sql->fetch_array()){
		echo $dados["id_u"];
		echo ", ";
		echo $dados["nick"];
	}
}else{echo"login_erro";}
?>