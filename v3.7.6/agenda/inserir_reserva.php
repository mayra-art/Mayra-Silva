<!--Inserir no Banco o formulário de RESERVA-->

<?php
session_start();
include 'conexao.php';
	//print_r($_POST);
	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];

	$NomeEvento = $_POST['NomeEvento'];
	$IdFunc = $_POST['IdFunc'];
	$start = $_REQUEST['start'];
	$end = $_REQUEST['end'];
	$CorReserva = $_POST['CorReserva'];
	$IdVisit = $_POST['IdVisit'];
	$IdTurma = $_POST['IdTurma'];
	$IdDisciplina = $_POST['IdDisciplina'];

	$vItens_tmp = Array(0);


// Para o veto fItens selecionados
//Armazena o numero 1 se o produto tiver usado
foreach ($_GET["fItens"] as $itens) {
	
	$vItens_tmp[$itens+1]=1;
	echo "$itens<br/>";

}


//Converter a data e hora inicio do formato brasileiro para o formato do Banco de Dados
$start = explode(" ", $start);
list($date, $hora) = $start;
$datastart_sem_barra = array_reverse(explode("/", $date));
$datastart_sem_barra = implode("-", $datastart_sem_barra);
$datastart_sem_barra = $datastart_sem_barra . " " . $hora;

//Converter a data e hora fim do formato brasileiro para o formato do Banco de Dados
$end = explode(" ", $end);
list($date, $hora) = $end;
$dataend_sem_barra = array_reverse(explode("/", $date));
$dataend_sem_barra = implode("-", $dataend_sem_barra);
$dataend_sem_barra = $dataend_sem_barra . " " . $hora;


$sql = "INSERT INTO `agenda`(`NomeEvento`, `start`, `end`, `CorReserva`, `IdVisit`, `IdFunc`, `IdTurma`, `IdDisciplina`) VALUES  ('$NomeEvento', '$datastart_sem_barra', '$dataend_sem_barra', '$CorReserva', $IdVisit, $IdFunc, $IdTurma, $IdDisciplina )";

$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = '<div class="alert alert-success"  role="alert"> Data cadastrada com sucesso </div>';
	header("Location: listar_reserva.php");
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger"  role="alert"> Erro ao cadastradar a data </div>';
	header("Location: listar_reserva.php");
}


$sql2 = "INSERT INTO `agenda_itens`(`IdProdutoUsado`) VALUES ($vItens_tmp)";
$inserir2 = mysqli_query($conexao, $sql2);



//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Itens Cadastrados com sucesso! </div>';
	header("Location: listar_reserva.php");
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar os itens </div>';
	header("Location: listar_reserva.php");
}




?>
