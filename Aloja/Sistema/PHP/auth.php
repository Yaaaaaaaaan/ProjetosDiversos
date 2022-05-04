<?php
  include "../DB/connectview.php";
  include"../PHP/class.php"; 
  if (session_status() !== PHP_SESSION_ACTIVE) {
  session_cache_expire(10);
  session_start();
  $nick=htmlspecialchars($_POST["usuario"]);
  $senha=htmlspecialchars($_POST["senha"]);
  $sql="select * from operador where usuarioOp='$nick'";
  
  $resultado=mysqli_query($link,$sql);
  $hash=mysqli_fetch_array($resultado);
  
  if($valor=Bcrypt::check($senha, $hash['senhaOp'])){
    $_SESSION['id']=$hash['idOperat'];
    $_SESSION['nick']=$hash['usuarioOp'];
    $_SESSION['nome']=$hash['nomeOp'];
    $_SESSION['rank']=$hash['rankOp'];
    $_SESSION['nick']=md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
      header('location:../../Web/auth.php');
    }else{ 
      session_unset();
      header('location:../../Web/index.php');
  }
}else{ 
      session_unset();
      header('location:../../Web/index.php');
  }
?>
