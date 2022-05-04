<?php
  include "../DB/connectview.php";
  include"../PHP/class.php"; 
  session_cache_expire(10);
  session_start();
  $nick=htmlspecialchars($_POST["usuario"]);
  $senha=htmlspecialchars($_POST["senha"]);
  $sql="select * from operador where usuario='$nick'";
  
  $resultado=mysqli_query($link,$sql);
  $hash=mysqli_fetch_array($resultado);
  
  if($valor=Bcrypt::check($senha, $hash['senha'])){
    $_SESSION['id']=$hash['id_ope'];
    $_SESSION['nick']=$hash['usuario'];
    $_SESSION['nome']=$hash['nome'];
    $_SESSION['rank']=$hash['rank'];
    $_SESSION['nick']=md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
      header('location:../../Web/auth.php');
    }else{ 
      session_unset();
      header('location:../../Web/index.php');
  }

?>
