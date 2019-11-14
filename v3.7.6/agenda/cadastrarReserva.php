<!--PAGINA PRINCIPAL AGENDA-->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--meta tags -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agenda</title>
	<style type="text/css">
      .carregando{
        color:#ff0000;
        display:none;
      }
    </style>
     <!-- Bootstrap CSS -->


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
  <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.datetimepicker.min.css" >

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>

  <script src="js/jquery.js"></script>
  <script src="js/jquery.datetimepicker.full.js"></script>

	


</head>
<body>

    <?php

    session_start();

//SESSION: Pega Login da sessão, sem GET e nem o POST
      $Login = $_SESSION['Login'];
//Se não existir (isset) quando não há login
      if (!isset($_SESSION['Login'])) {
        header('Location: ../login/login.php');
	  }
      include 'conexao.php';

      $sql = "SELECT `IdFunc`, `Cargo`, `Nome`  FROM `funcionarios` WHERE `Login` = '$Login' ";
      $buscar = mysqli_query($conexao, $sql);
      $array = mysqli_fetch_array($buscar);
      $IdFunc = $array['IdFunc'];
      $CargoAcesso = $array['Cargo'];
      $Nome = $array['Nome'];
    ?>


	<div class="container" id="tamanhoContainer">
	
		<a href="listar_reserva.php" id="novo"><i class="fas fa-angle-double-left"></i></a>
		<h4>Reserve o Laboratório de práticas pedagógicas</h4>
		
		<form action="inserir_reserva.php" method="post" style="margin-top: 20px">
	 		
        <div class="row">

          <div class="col-sm-6">
            <label>Id Agenda</label>
            <input type="number" class="form-control" name="IdAgenda" placeholder="Campo automático" disabled>
          </div>  

          <div class="col-sm-6">
            <label>Professor</label>
            <input type="number" class="form-control" name="IdFunc" value="<?php$IdFunc?>" placeholder="<?php echo $Nome?>" disabled >
          </div>

        </div>

  			<div class="form-group" style="margin-top: 20px">
	    		<label>Título Atividade</label>
	    		<input type="text" class="form-control" name="NomeEvento"  placeholder="Insira o titulo" required>
  			</div>
   
        <div class="form-group">
          <div class="input-group date" id="datetimepicker1"> 
            <label>Início</label>
            <input type="text" id="datetimepicker1" class="form-control" name="start"  />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>



          <div class="row">
            <div class='col-sm-12'>
            <div class="form-group">
              
                <label>Data:</label>
                <input id= "datetime" data-date-format="DD-MM-YYYY" class="form-control" />
               
              
            </div>
          </div>
        </div>
       



        <div class="form-group">
          <div class="input-group date" id="datetimepicker1"> 
            <label>Fim</label>
            <input type="text" id="datetimepicker1" class="form-control" name="end"  />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>

        <div class="form-group">
          <label>Cor</label>
          <input type="color" class="form-control" name="CorReserva" >
        </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Visitante</label>
              <select class="form-control" name="IdVisit" id="IdVisit">
              <option>Escolha o Visitante</option>
              
              <?php
                include 'conexao.php';

                $sql = "SELECT * FROM `visitante` order by `NomeVisitante` ";
                $busca = mysqli_query($conexao, $sql);

                while($vetor=mysqli_fetch_assoc($busca)){

                  echo '<option value="'.$vetor['IdVisit'].'">'.$vetor['NomeVisitante'].'</option>';
                }

              ?>
              </select>
              <br/><br/>
            </div>
          


          
            <div class="col-sm-6">
              <label>Turma</label>
              <select class="form-control" name="IdTurma" id="IdTurma">
              <option>Escolha a Turma</option>
              
              <?php
                include 'conexao.php';

                $sql = "SELECT * FROM `turma` order by `DescricaoTurma` ";
                $busca = mysqli_query($conexao, $sql);

                while($vetor=mysqli_fetch_assoc($busca)){

                  echo '<option value="'.$vetor['IdTurma'].'">'.$vetor['DescricaoTurma'].'</option>';
                }

              ?>
              </select>
              <br/><br/>
            </div>
          </div>

		  	   <div class="form-group">
            <label>Disciplina</label>
            <span class="carregando"> Aguarde, carregando...</span>
            <select class="form-control" name="IdDisciplina" id="IdDisciplina">
              <option>Escolha a Disciplina</option>
             </select><br><br> 
           </div>

           <div class="form-group">
             <label>Materiais que irá utilizar:</label>
           </div>
           <div class="table-responsive">
            <table class="table table-sm" >
              <thead>
                <tr>
                  <th scope="col">Marcar</th>
                  <th scope="col">Id</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Medida</th>
                  <th scope="col">Qntd</th>
                  <th scope="col">Categoria</th>
                </tr>
              </thead>

            <?php

            include 'conexao.php';
            $sql = "SELECT * FROM `inventario` ";
            $buscar = mysqli_query($conexao, $sql);

            while ($array = mysqli_fetch_array($buscar)) {

              $IdProduto = $array['IdProduto'];
              $Descricao = $array['Descricao'];
              $Medida = $array['Medida'];
              $Qntd = $array['Qntd'];
              $Categoria = $array['Categoria'];
          ?>
          <tr> 
            <td>         
            <input type="checkbox" name=fItens[] value=<?php $IdProduto?>><br/>
            </td>
            <td><?php echo $IdProduto ?></td>
            <td><?php echo $Descricao ?></td>
            <td><?php echo $Medida ?></td>
            <td><?php echo $Qntd ?></td>
            <td><?php echo $Categoria ?></td>
          </tr>  
            <?php } ?> <!--fim while array listar-->
          </div> <!--fim div Listar Intens usados-->


			     <div id="botao">
				      <button type="submit" class="btn btn-success " >Salvar</button>
			     </div>
		  </form>	


	</div><!--Fecha container-->


  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("jquery", "1.4.2");
  </script>
    
    <script type="text/javascript">
    $(function(){
      $('#IdTurma').change(function(){
        if( $(this).val() ) {
          $('#IdDisciplina').hide();
          $('.carregando').show();
          $.getJSON('sub_disciplinas.php?search=',{IdTurma: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value="">Escolha Disciplina</option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].IdTurma + '">' + j[i].DescricaoDisciplina + '</option>';
            } 
            $('#IdDisciplina').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#IdDisciplina').html('<option value="">– Escolha Disciplina –</option>');
        }
      });
    });
    </script>



	<!--Data e hora-->
  <script>
      $("#datetime").datetimepicker();
  
  </script>

       



</body>
</html>

