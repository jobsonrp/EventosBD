<?php require "../controle/checklogin.php"; ?>
<!DOCTYPE html>
<html ng-app>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <script src="../js/angular.min.js"></script>
</head>
<body>
<main class="container">
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="Ambiente.php">Ambiente</a></li>
		<li class="breadcrumb-item active">Novo Ambiente</li>
	</ol>
    <h2>Novo Ambiente</h2>

    <form method="POST" action="../controle/ambiente.func.php">
        <hr />
        <input type="hidden" name="opcao" value="inserir">


    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text"  min="0" class="form-control" name="nomeamb" required>
    </div>

        <div class="form-group col-md-5">
            <label for="campo2">Tipo de Ambiente</label>
            <select ng-model="ambiente" name="ambiente"  class="form-control" required>
                <option value='coberto'>Coberto</option>
                <option value='descoberto'>Descoberto</option>
                <option value='parcialmenteCoberto'>Parcialmente Coberto</option>
            </select>
        </div>

    <div class="form-group col-md-3">
      <label for="name">Capacidade</label>
      <input type="number"  min="0" class="form-control" name="capacidade" required>
    </div>

    <div class="form-group col-md-3" ng-if="ambiente=='coberto' || ambiente=='parcialmenteCoberto'">
      <label for="name">Numero Assentos Coberto</label>
      <input type="number"  min="0" class="form-control" name="numeroAssentosCoberto">
    </div>

    <div class="form-group col-md-3" ng-if="ambiente=='descoberto' || ambiente=='parcialmenteCoberto'">
      <label for="name">Numero Assentos Descoberto</label>
      <input type="number"  min="0" class="form-control" name="numeroAssentosDescoberto">
    </div>


        <div id="actions" class="row">
            <div class="col-md-12">
                <input type="submit" name="Salvar" value='Salvar' class="btn btn-sm btn-primary">

                <a href="Ambiente.php" class="btn btn-sm btn-default">Cancelar</a>
            </div>
        </div>

    </form>



</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>