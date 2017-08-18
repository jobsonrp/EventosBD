<?php
	require "../controle/conf.php";
	require "../controle/checklogin.php";

	function insert($dados){
		try{
			Conexao::conectar()->prepare("INSERT INTO pessoa (`cpf`, `nome`, `nomeAcompanhante`, `datanascimento`) VALUES (:cpf, :nome, :nomeAcompanhante, :datanascimento)")->execute($dados);
            Conexao::desconnectar();
		}catch(PDOException $e){
			print_r($e->getMessage());
		}
    }
    function atualiza($dados,$id){
    	try{
    		Conexao::conectar()->prepare("UPDATE  `pessoa` SET  `nome` =  :nomepessoa, `nomeAcompanhante` =  :nomeacomp, `datanascimento` =  :datanascimento WHERE `cpf` = ".$id)->execute($dados);
    		Conexao::desconnectar();    
    	}catch(PDOException $e){
    		print_r($e->getMessage());
        }
    }

    function delet($dados){
        try{
            Conexao::conectar()->prepare("DELETE FROM `pessoa` WHERE `cpf` = :cod")->execute($dados);
            Conexao::desconnectar();
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }


	if (isset($_POST['opcao'])) {
		$opcao = $_POST['opcao'];

		if ($opcao=='inserir') {
			insert(array('cpf' => $_POST['cpf'], 'nome' => $_POST['nomepessoa'], 'nomeAcompanhante' => $_POST['nomeacomp'], 'datanascimento' => $_POST['datanascimento']));
		}elseif ($opcao=='delete') {
			delet(array('cod' => $_POST['codigo']));

		}elseif ($opcao=='atualiza') {
			$dados = array('nomepessoa' =>  $_POST['nomepessoa'], 'nomeacomp' =>  $_POST['nomeacomp'], 'datanascimento'  =>  $_POST['datanascimento']);
			atualiza($dados,$_POST['cpf']);
		}

	}
	header("Location: ../paginas/pessoa.php");

?>