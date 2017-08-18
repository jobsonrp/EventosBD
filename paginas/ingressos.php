<?php 
    require "../controle/conf.php";
    require "../controle/checklogin.php";

    $exite = 0;

    $sql = "SELECT * FROM ingresso natural join pessoa natural join evento ";
    try{
    	$stmt = Conexao::conectar()->query($sql);
    	$exite = $stmt->rowCount();
    }catch(PDOException $e){
    	print_r($e->getMessage());
    }
    Conexao::desconnectar();
	


?>
<!DOCTYPE html>
<html lang="en">
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
		<li class="breadcrumb-item active">Ingressos</li>
	</ol>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Ingressos</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary btn-sm" href="vanda.php"><i class="fa fa-plus"></i> Vender Ingresso</a>

        </div>
    </div>
</header>

<?php if ($exite>0) : ?>
	<table  class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>Nome do Evento</th>
				<th>Data do Evento</th>
				<th>CPF</th>
				<th>Nome</th>
				<th>Acompanhante</th>
				<th>Data da Compra</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($result = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
				<tr>
					<td><?php echo $result->Enome; ?></td>
					<td><?php echo $result->dataEvento; ?></td>
					<td><?php echo $result->cpf; ?></td>
					<td><?php echo $result->nome; ?></td>
					<td><?php echo $result->nomeAcompanhante; ?></td>
					<td><?php echo $result->dataCompra; ?></td>
					<td>

					<a class="btn btn-sm btn-danger" href="ingressosConfDelete.php?codigo=<?php echo $result->codigoIngresso; ?>"> <i class="fa fa-trash"></i> Cansela Compra</a>
					
				</tr>
			<?php } ?>
		</tbody>
	</table>

<?php else : ?>
    <tr>
        <td colspan="6">Nenhum registro encontrado.</td>
    </tr>
<?php endif; ?>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>