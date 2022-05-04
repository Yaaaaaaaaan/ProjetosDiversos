<html>
	<head>
		<title>Registro de novo usuário</title>
	</head>
	<body>
		<form name="submit" method="POST" action="../Sistema/func.php">
			Nome: <input type="text" name="nome">
			<br><p>
			CPF: <input type="text" name="cpf">
			<br><p>
			Nascimento: <input type="date" name="nasc">
			<br><p>
			Nome de Usuário: <input type="text" name="usuario">
			<br><p>
			Senha: <input type="password" name="senha">
			<br><p>
				<select name="rank">
					<option value="5">BOSS</option>
					<option value="4">ADMIN</option>
					<option value="3">MODERATOR</option>
					<option value="2">STAFF</option>
					<option value="1">USER</option>
				</select>
				<br><p>
			<input type="submit" value="submit" >
		</form>
	</body>
</html>