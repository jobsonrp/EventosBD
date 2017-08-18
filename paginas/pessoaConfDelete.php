<?php require "../controle/checklogin.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <div class="span10 offset1">
      <div class="row">
        <h2>Apagar Cadastro</h2>
      </div>
      <form class="form-horizontal" action="../controle/pessoa.func.php" method="POST">
        <input type="hidden" name="codigo" value="<?php echo $_GET['codigo'];?>"/>
        <input type="hidden" name="opcao" value="delete"/>
          <p class="alert alert-error">Deseja Realmente Apagar o Cadastro ?</p>
          <div class="form-actions">
            <button type="submit" class="btn btn-sm btn-danger">Sim</button>
            <a class="btn btn-sm  btn-default" href="pessoa.php">não</a>
          </div>
      </form>
    </div>
  </div>
</body>
</html>