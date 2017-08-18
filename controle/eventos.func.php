<?php
    require "../controle/conf.php";

    function deletEvento($dados){
        try{
            Conexao::conectar()->prepare("DELETE FROM `evento` WHERE`codigoEvent` = :codEvent")->execute($dados);
                Conexao::desconnectar();
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    function insertEvento($dados){
        try{
            Conexao::conectar()->prepare("INSERT INTO evento (`codigoEvent`, `Enome`, `Edescricao`, `dataEvento`, `codigoAmbiente`, `codigoTipoEvento`) VALUES (:codEvent, :Enome, :Edesc, :dataEv, :codAmb, :codTEv)")->execute($dados);
            Conexao::desconnectar();    
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }
    function atualizaEvento($dados,$id){
        try{
            Conexao::conectar()->prepare("UPDATE  `evento` SET  `Enome` =  :Enome, `Edescricao` =  :Edescricao, `dataEvento` =  :dataEvento,  `codigoTipoEvento` =  :codigoTipoEvento, `codigoAmbiente` =  :codigoAmbiente WHERE `codigoEvent` = ".$id)->execute($dados);
            Conexao::desconnectar();    
        }catch(PDOException $e){
            print_r($e->getMessage());
        }   
    }
    if (isset($_POST['opcao'])) {
        $opcao = $_POST['opcao'];
        if ($opcao=='delete') {
            if (isset($_POST['codigoDlete'])) {
                deletEvento(array('codEvent' => $_POST['codigoDlete']));
            }
        }elseif ($opcao=='atualiza') {
            if (isset($_POST['codigoEvent'])) {
                atualizaEvento(array('Enome' => $_POST['Enome'],'Edescricao' => $_POST['edescricao'],'dataEvento' => $_POST['dataevento'],'codigoTipoEvento' => $_POST['descricao'],'codigoAmbiente' => $_POST['ambiente']),$_POST['codigoEvent']);
            }
        }
    }else{
        insertEvento(array('codEvent' => 'NULL', 'Enome' => $_POST['Enome'], 'Edesc' => $_POST['edescricao'], 'dataEv' => $_POST['dataevento'], 'codAmb' => $_POST['ambiente'], 'codTEv' => $_POST['descricao']));
    }
    header("Location: ../paginas/eventos.php");
?>
