<?php
    require "../controle/conf.php"; 
    require "../controle/checklogin.php";

    try{
        $codigos =  $_GET['codigo'];
        $stmt = Conexao::conectar()->query("SELECT * FROM ambiente WHERE codigoAmbiente=".$codigos);
        $exite = $stmt->rowCount();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
    }catch(PDOException $e){

    }
    
?>
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
</head>
<body>

<main class="container">
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="Ambiente.php">Ambiente</a></li>
		<li class="breadcrumb-item active">Editar Ambiente</li>
	</ol>
    <h2>Editar Ambiente</h2>


    <form method="POST" action="../controle/ambiente.func.php">
        <hr />
        <div class="row">
            <input type="hidden" name="opcao" value="atualiza">
            <input type="hidden" name="codigoAmbiente" value="<?php echo $result->codigoAmbiente; ?>">

            <div class="form-group col-md-7">
                <label for="nomeamb">Nome</label>
                <input type="text"  id="nomeamb" min="0" class="form-control" name="nomeamb" value="<?php echo $result->ambienteNome; ?>">
            </div>

            <div class="form-group col-md-5">
                <label for="ambiente">Tipo de Ambiente</label>
                    <select id="ambiente" name="ambiente"  class="form-control" value="<?php echo $result->ambiente; ?>">
                    <option value='coberto'>Coberto</option>
                    <option value='descoberto'>Descoberto</option>
                    <option value='parcialmenteCoberto'>Parcialmente Coberto</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="capacidade">Capacidade</label>
                <input type="number" id="capacidade" min="0" class="form-control" name="capacidade" value="<?php echo $result->capacidade; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="AsseCobe">Numero Assentos Coberto</label>
                <input type="number" id="AsseCobe" min="0" class="form-control" name="numeroAssentosCoberto" value="<?php echo $result->numeroAssentosCoberto; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="AssedesCobe">Numero Assentos Descoberto</label>
                <input type="number" id="AssedesCobe" min="0" class="form-control" name="numeroAssentosDescoberto" value="<?php echo $result->numeroAssentosDescoberto; ?>">
            </div>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                    <a href="Ambiente.php" class="btn btn-sm btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </form>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>