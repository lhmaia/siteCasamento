<?php
	require_once dirname(__FILE__).'/processa_login.php';
	
	if(!($_SESSION["usuarioSessao"]->eMembro(1))){
		header("Location: ../index.php");
	}

?>

<!DOCTYPE html>
<html>

<head>
	<title>
	Casamento Luiz e Fernanda
	</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body>

	<table border="1">
		<tr>
		<th>Nome</th>
		<th>E-mail</th>
		<th></th>
		
		</tr>
		<?php 
			$listausuarios = pessoa::listaUsuarios();
			while ($row = mysqli_fetch_array($listausuarios, MYSQLI_ASSOC)) {
				echo "<tr>";
					echo "<th>";
						echo $row['nome'];
					echo "</th>";
					echo "<th>";
						echo $row['email'];
					echo "</th>";
					echo "<th>";
						echo "<a href=\"exibedados_usuarios.php?aprovar=exibir&id_usuario=" . $row['id'] . "\" >Ver detalhes</a>";
					echo "</th>";
				echo "</tr>";
			}
		?>
	
	</table>

	<a href="../index.php">Pagina inicial</a>
</body>
</html>