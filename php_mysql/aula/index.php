<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Projeto2JS</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet"> 
</head>
<body>
	<?php include('code_php.php') ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" id="parallax-1"><h3 class="title-parallax">PIPELINE</h3></div>
			<div id="caixaDeTexto" class="col-12"> <!-- entrada texto -->
				<h4>Digite o nome da tarefa</h4>
				<form method="post" action="">
					<input id="nomeTarefa" type="text" name="Tarefa" size="40"> <!-- name="Tarefa" é o identificador usado para pegar a entrada com POST -->
					<button id="Criar" name="Criar" type="submit">Criar</button>
				</form>
			</div>
			<div id="Fazer" class="col-4">  <!-- a fazer -->
				<div class= nome>
					<h3>A Fazer</h3>
				</div>
				<?php $results = mysqli_query($conexao, "select * from tarefas")?>
				<?php while ($row = mysqli_fetch_array($results)) { 
					if($row['coluna_stats']==$fazer) { ?>
						<div class="Afazer">
							<tr>
								<td><?php echo $row['coluna_tarefa']; ?></td>
								<td>
									<a href="code_php.php?muda=<?php echo $row['id']; ?>"  onclick="return confirm('Tem certeza que deseja mudar o status?')" class="muda">MS</a>
								</td>
								<td>
									<a  href="code_php.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar a tarefa?')" class="apaga">D</a>
								</td>
							</tr>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<div id="Fazendo" class="col-4"> <!-- fazendo -->
				<div class= nome>
					<h3>Fazendo</h3>
				</div>
				<?php $results = mysqli_query($conexao, "select * from tarefas")?>
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<?php if($row['coluna_stats']==$fazendo){ ?>
						<div class="Fazendoo">
							<tr>
								<td><?php echo $row['coluna_tarefa']; ?></td>
								<td>
									<a href="code_php.php?muda=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja mudar o status?')" class="muda">MS</a>
								</td>
								<td>
									<a  href="code_php.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar a tarefa?')" class="apaga">D</a>
								</td>
							</tr>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<div id="Feito" class="col-4"> <!-- terminado -->
				<div class= nome>
					<h3>Feito</h3>
				</div>
				<?php $results = mysqli_query($conexao, "select * from tarefas")?>
				<?php while ($row = mysqli_fetch_array($results)) {
					if($row['coluna_stats']==$feito) { ?>
						<div class="Feitoo">
							<tr>
								<td><?php echo $row['coluna_tarefa']; ?></td>
								<td>
									<a  href="code_php.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar a tarefa?')" class="apaga">D</a>
								</td>
							</tr>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>