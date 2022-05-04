<?php
  include "connectview.php"; /* Script de conexão com o banco */
  include"Frameworks/class.php"; /* a criptografia básica. */
  session_cache_expire(10);
  session_start();
  $nick=htmlspecialchars($_POST["nick"]);
  $senha=htmlspecialchars($_POST["senha"]);
  $sql="select * from colaborador where nick='$nick'";
  
  $resultado=mysqli_query($link,$sql); /* Onde está $link altera pra conexão com o banco */
  $hash=mysqli_fetch_array($resultado);
  
  if($valor=Bcrypt::check($senha, $hash['senha'])){
    $_SESSION['id']=$hash['id_col'];
    $_SESSION['nick']=$hash['nick'];
    $_SESSION['rank']=$hash['rank'];
      header('location:inicio.php');
    }else{ 
      session_unset();
      header(''); /* Digitar endereço da home do hyce */
  }

?>
