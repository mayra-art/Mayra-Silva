<?php

include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM `visitante` WHERE `IdVisit` = $id";
$deletar = mysqli_query($conexao, $sql)

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container" style="width: 500 px; margin-top: 20px; margin-bottom: 30px;">
	<h4>Excluído com sucesso!</h4>
	<div style="padding-top: 20px">
		<center>
			<a href="listar_visitante.php" role="button" class="btn btn-sm btn-warning" style="color:#fff">Voltar</a>
		</center>
	</div>
</div>