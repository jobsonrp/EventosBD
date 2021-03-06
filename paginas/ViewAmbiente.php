<?php
    require "../controle/conf.php";
    require "../controle/checklogin.php";

    $codigos =  $_GET['codigo'];
    $sql = "SELECT * FROM ambiente WHERE codigoAmbiente=".$codigos;
    $stmt = Conexao::conectar()->query($sql);
    $exite = $stmt->rowCount();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

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
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>

<main class="container">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="../index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="Ambiente.php">Ambiente</a></li>
		<li class="breadcrumb-item active">Ambiente view</li>
	</ol>

	<?php  if($exite>0): ?>
	<h2>Ambiente : <?php echo $result->ambienteNome; ?></h2>
		<hr>
		<dl class="dl-horizontal">
			<dt>Descrição:</dt>
			<dd><?php echo $result->ambiente; ?></dd>
			<dt>Capacidade Total:</dt>
			<dd><?php echo $result->capacidade; ?></dd>

			<?php if($result->ambiente=='parcialmenteCoberto'){?>
				<dt>Assentos Coberto:</dt>
				<dd><?php echo $result->numeroAssentosCoberto; ?></dd>
				<dt>Assentos Descoberto:</dt>
				<dd><?php echo $result->numeroAssentosDescoberto; ?></dd>
			<?php }elseif ($result->ambiente=="coberto") { ?>
				<dt>Assentos Coberto:</dt>
				<dd><?php echo $result->numeroAssentosCoberto; ?></dd>
			<?php }else{ ?>
				<dt>Assentos Descoberto:</dt>
				<dd><?php echo $result->numeroAssentosDescoberto; ?></dd>
			<?php } ?>
		</dl>
		<div id="actions" class="row">
			<div class="col-md-12">
				<a href="editAmbiente.php?codigo=<?php echo $result->codigoAmbiente; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="Ambiente.php" class="btn btn-sm  btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</a>

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