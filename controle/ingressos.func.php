<?php
    require "../controle/conf.php";
    
    function delet($id_Ingesso){
        try{
        	$sql = "DELETE FROM `ingresso` WHERE `codigoIngresso` = ?";
        	$statement = Conexao::conectar()->prepare($sql);
        	$statement->bindParam(1, $id_Ingesso);
            $statement->execute();
            Conexao::desconnectar();
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    } 

    if (isset($_POST['opcao'])) {
        $opcao = $_POST['opcao'];

        if ($opcao=='delete') {
        	if (isset($_POST['codigo'])) {
        		delet($_POST['codigo']);
        	}
        }
    }
    header("Location: ../index.php");
?>