<?php
	 $conexao = mysqli_connect('localhost', 'root', 'ecompirinha', 'kanban') or die("Erro na conexão com banco de dados " . mysqli_error($conexao));

	$tarefa = "";
	$id = 0;
	$update = false;
	$fazer=0;
	$fazendo=1;
	$feito=2;

	if (isset($_POST['Criar'])) { /* cria nova tarefa */
		$tarefa = $_POST['Tarefa'];
		if($tarefa != ""){
			$string_sql = "INSERT INTO tarefas (coluna_tarefa,coluna_stats) VALUES ('$tarefa','$fazer')"; 
		}
		

		if(mysqli_query($conexao, $string_sql))
			echo "Inserido com sucesso.";
		else
			echo "Erro, não foi possível inserir no banco de dados";	
		header("location:index.php");				
	}

	if (isset($_GET['muda'])) { /* muda tarefa */
		$id = $_GET['muda'];
		$mudar =mysqli_query($conexao, "SELECT * FROM tarefas WHERE id=$id");

		if (count($mudar) == 1 ) {
			$n = mysqli_fetch_array($mudar);
			if($n['coluna_stats']==$fazer)
				$mudar = mysqli_query($conexao, "UPDATE tarefas SET coluna_stats=$fazendo WHERE id=$id");
			else
				$mudar = mysqli_query($conexao,"UPDATE tarefas SET coluna_stats=$feito WHERE id=$id");
		header("location:index.php");
		}
	}

	if (isset($_GET['del'])) { /* deleta tarefa */
		$id = $_GET['del'];
		$deletado = mysqli_query($conexao,"DELETE FROM tarefas WHERE id=$id");
		header("location:index.php");
	}
?>