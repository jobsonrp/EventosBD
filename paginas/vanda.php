<?php 
    require "../controle/conf.php";
    require "../controle/checklogin.php";

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
		<li class="breadcrumb-item active">Vender Ingrsso</li>
	</ol>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Vender Ingresso</h2>
        </div>
    </div>
</header>

<form action="../controle/venda.func.php" method="post">

    <div class="row">
        <div class="form-group col-md-5">
          <label for="campo2">Clientes Cadastrados:</label>
          <select name="cliente"  class="form-control" required>
          <?php 
            $stmt = Conexao::conectar()->query("SELECT * FROM pessoa");
            Conexao::desconnectar();
            while ($result =$stmt->fetch(PDO::FETCH_OBJ)) { ?>
            <option value="<?php echo $result->cpf; ?>"><?php echo $result->nome; ?></option>
          <?php } ?>
          </select>
        </div>

        <div class="form-group col-md-5">
          <label for="campo2">Eventos Disponiveis:</label>
          <select name="evento"  class="form-control" required>
          <?php 
            $stmt = Conexao::conectar()->query("SELECT * FROM evento");
            Conexao::desconnectar();
            while ($result =$stmt->fetch(PDO::FETCH_OBJ)) { ?>
            <option value="<?php echo $result->codigoEvent; ?>"><?php echo $result->Enome; ?></option>
          <?php } ?>
          </select>
        </div>

        <div class="form-group col-md-2">
            <label for="campo3">Data do Compra</label>
            <input type="date" class="form-control" name="datacompra" required>
        </div>
        </div>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary">Confirmar Compra</button>
                <a href="index.php" class="btn btn-sm btn-default">Cancelar</a>
            </div>
        </div>
</form>
</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>