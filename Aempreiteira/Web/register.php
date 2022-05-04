<?php

?>
<html>
	<head>
		<title>Registro de novo usuário</title>
	</head>
	<body>
		<form name="submit" method="POST" action="../sistema/php/regsave.php">
			Nome: <input type="text" name="nome">
			<br><p>
			CPF: <input type="text" name="cpf">
			<br><p>
			Nascimento: <input type="date" name="nascimento">
			<br><p>
			Nome de Usuário: <input type="text" name="usuario">
			<br><p>
			Senha: <input type="password" name="senha">
			<br><p>
			<input type="submit" value="submit" >
		</form>
	</body>
</html>