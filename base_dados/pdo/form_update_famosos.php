<?php
	include_once 'mysql_conexao_pdo.php';

	$id = $_GET["id"];
	$famosos = new stdClass;

		//executa uma instrução SQL de update
	$result = $conn -> query("SELECT * FROM famosos WHERE idFamosos = '{$id}'");
	if ($result){
		$row = $result->fetch();
		$famosos -> id = $row["idFamosos"];
		$famosos -> nome = $row["nome"];
		$famosos -> codigo = $row["codigo"];
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fomulário Famosos</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="POST" action="mysql_update_pdo.php">
			<input type="hidden" name="id" value="<?php echo $famosos -> id; ?>">
			<label>Código do Livro</label><br>
			<input type="text" name="codigo" 
			value="<?php echo $famosos -> codigo; ?>"><br>
			<label>Nome do Famoso</label><br>
			<input type="text" name="nome" value="<?php echo $famosos -> nome; ?>"><br>
			<input type="submit" name="Enviar">
		</form>
	</body>
</html>