<?php
    require "../controle/conf.php";


    function insert($dados){
        try{
            Conexao::conectar()->prepare("INSERT INTO ingresso (`codigoIngresso`, `cpf`, `codigoEvent`, `dataCompra`) VALUES (:codigoIngresso, :cpf, :codigoEvent, :dataCompra)")->execute($dados);
            Conexao::desconnectar();    
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    if (isset($_POST['cliente']) && isset($_POST['evento'])) {
    	insert(array('codigoIngresso' => 'NULL', 'cpf' => $_POST['cliente'],'codigoEvent' => $_POST['evento'],'dataCompra' => $_POST['datacompra']));
    }
    header("Location: ../index.php");
?>