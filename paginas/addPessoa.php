<?php require "../controle/checklogin.php"; ?>
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
        <li class="breadcrumb-item"><a href="pessoa.php">Cliesntes</a></li>
        <li class="breadcrumb-item active">Cadastro de Clientes</li>   
    </ol>
    <h2>Cadastro de Clientes</h2>
    <form method="POST" action="../controle/pessoa.func.php">
        <hr/>
        <input type="hidden" name="opcao" value="inserir">
        
        <div class="form-group col-md-3">
            <label for="name">CPF: </label>
            <input type="text" class="form-control" name="cpf" required>
        </div>
        <div class="form-group col-md-7">
            <label for="name">Nome: </label>
            <input type="text" class="form-control" name="nomepessoa" required>
        </div>
        <div class="form-group col-md-7">
            <label for="name">Nome do Acompanhante: </label>
            <input type="text" class="form-control" name="nomeacomp">
        </div>

        <div class="form-group col-md-3">
            <label for="name">Data Nascimento: </label>
            <input type="date" class="form-control" name="datanascimento">
        </div>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                <a href="pessoa.php" class="btn btn-sm btn-default">Cancelar</a>
            </div>
        </div>
    </form>


</main>
    <?php include '../static/footer.php'; ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>       