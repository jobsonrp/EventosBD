<?php
	require "../controle/conf.php"; 

	date_default_timezone_set('UTC');

	try{
		$consulta = Conexao::conectar()->query("SELECT * FROM pessoa WHERE cpf= ".$_GET['codigo']);
	}catch(PDOException $e){
		echo $e->getMessage();
    }
    Conexao::desconnectar();
    $exite = $consulta->rowCount();
    $result = $consulta->fetch(PDO::FETCH_OBJ)
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href=../css/font-awesome.min.css">
</head>
<body>

<main class="container">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="../index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="pessoa.php">Cliente</a></li>
		<li class="breadcrumb-item active">Cliente view</li>
	</ol>
	<?php  if($exite>0): ?>

		<h2>Cliente : <?php echo $result->nome; ?></h2><hr>

		<dl class="dl-horizontal">
			<dt>CPF:</dt>
			<dd><?php echo $result->cpf; ?></dd>
			<dt>Cliente Nome:</dt>
			<dd><?php echo $result->nome; ?></dd>
			<dt>Acompanhante:</dt>
			<dd><?php echo $result->nomeAcompanhante; ?></dd>
			<dt>Data Nascimento:</dt>
			<dd><?php echo date("d/m/Y", strtotime($result->datanascimento)); ?></dd>
		</dl>

		<div id="actions" class="row">
			<div class="col-md-12">
				<a href="editPessoa.php?codigo=<?php echo $result->cpf; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="pessoa.php" class="btn btn-sm  btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</a>
			</div>
		</div>
		<?php else : ?>
			<div class="alert alert-danger" role="alert">
				<p><strong>ERRO:</strong> Não Exite registro!</p>
			</div>
		<?php endif; ?>
</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>