<?php 
    require "../controle/conf.php"; 
    require "../controle/checklogin.php";

    date_default_timezone_set('UTC');
    
    try{
        $consulta = Conexao::conectar()->query("SELECT * FROM pessoa");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    Conexao::desconnectar();
?>
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
<main class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active">Clientes</li>
    </ol>
    
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Cliesntes</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-primary btn-sm" href="addPessoa.php"><i class="fa fa-plus"></i> Cadastra Cliente</a>
            </div>
        </div>
        <hr>
    </header>

<?php if ($consulta->rowCount()>0) : ?>
<table class="table table-hover table-condensed">
<thead>
    <tr>
        <th>Cpf</th>
        <th>Nome</th>
        <th>Nome do Acompanhante</th>
        <th>Data Nascimento</th>
        <th>Opções</th>
    </tr>
</thead>
<tbody>

<?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
    <tr>
        <td><?php echo $linha->cpf; ?></td>
        <td><?php echo $linha->nome; ?></td>
        <td><?php echo $linha->nomeAcompanhante; ?></td>
        <td><?php echo date("d/m/Y", strtotime($linha->datanascimento)); ?></td>
        <td class="actions text-right">
            <a href="ViewPessoa.php?codigo=<?php echo $linha->cpf; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
            <a href="editPessoa.php?codigo=<?php echo $linha->cpf; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
            <a href="pessoaConfDelete.php?codigo=<?php echo $linha->cpf; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Excluir</a>
        </td>
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