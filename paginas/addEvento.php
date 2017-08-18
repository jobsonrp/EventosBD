<?php 
  require "../controle/conf.php";
  require "../controle/checklogin.php";
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
  <li class="breadcrumb-item"><a href="eventos.php">Eventos</a></li>
  <li class="breadcrumb-item active">Cadastrar Evento</li>
</ol>

<h2>Novo Evento</h2>

<form action="../controle/eventos.func.php" method="post">

  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome  do Evento </label>
      <input type="text" class="form-control" name="Enome" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Descrição do Evento</label>
      <input type="text" class="form-control" name="edescricao" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data do Evento</label>
      <input type="date" class="form-control" name="dataevento" required>
    </div>

    <div class="form-group col-md-5">
      <label for="campo2">Ambiente</label>
      <select name="ambiente"  class="form-control">
      <?php 
        $stmt = Conexao::conectar()->query("SELECT * FROM ambiente");
        $exite = $stmt->rowCount();
        while ($result =$stmt->fetch(PDO::FETCH_OBJ)) { ?>

        <option value="<?php echo $result->codigoAmbiente; ?>"><?php echo $result->ambiente; ?></option>
      
      <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-5">
      <label for="campo2">Tipo do Evento</label>
      <select name="descricao"  class="form-control">

      <?php 
        $stmt = Conexao::conectar()->query("SELECT * FROM tipoevento");
        $exite = $stmt->rowCount();
        while ($result =$stmt->fetch(PDO::FETCH_OBJ)) { ?>

        <option value="<?php echo $result->codigoTipoEvento; ?>"><?php echo $result->descricao; ?></option>
      
      <?php } ?>
      </select>
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
      <a href="eventos.php" class="btn btn-sm btn-default">Cancelar</a>
    </div>
  </div>

</form>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
