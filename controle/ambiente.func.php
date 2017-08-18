<?php
	require "../controle/conf.php";

	function insert($dados){
		try{
			Conexao::conectar()->prepare("INSERT INTO ambiente (codigoAmbiente, ambienteNome, ambiente,capacidade,numeroAssentosCoberto,numeroAssentosDescoberto) VALUES (:codAmb,:ambienteNome, :ambiente,:capacidade,:nAssentosCob,:nAssentosDescob)")->execute($dados);
			Conexao::desconnectar();
			
		}catch(PDOException $e){
			print_r($e->getMessage());

		}
	}
    function atualiza($dados,$id){
        try{
            Conexao::conectar()->prepare("UPDATE  `ambiente` SET  `ambienteNome` =  :ambienteNome, `ambiente` =  :ambiente, `capacidade` =  :capacidade,  `numeroAssentosCoberto` =  :AssentosCoberto, `numeroAssentosDescoberto` =  :AssentosDescoberto WHERE `codigoAmbiente` = ".$id)->execute($dados);
            Conexao::desconnectar();    
        }catch(PDOException $e){
            print_r($e->getMessage());
        }   
    }
    function delet($dados){
        try{
            Conexao::conectar()->prepare("DELETE FROM `ambiente` WHERE`codigoAmbiente` = :codAmbi")->execute($dados);
                Conexao::desconnectar();
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }    	
	if (isset($_POST['opcao'])) {
		$opcao = $_POST['opcao'];

        if ($opcao=='delete') {
            if (isset($_POST['codigoDlete'])) {
                delet(array('codAmbi' => $_POST['codigoDlete']));
            }
        }elseif ($opcao=='atualiza') {
            if (isset($_POST['codigoAmbiente'])) {
            	atualiza(array('ambienteNome' => $_POST['nomeamb'],'ambiente' => $_POST['ambiente'],'capacidade' => $_POST['capacidade'],'AssentosCoberto' => $_POST['numeroAssentosCoberto'],'AssentosDescoberto' => $_POST['numeroAssentosDescoberto']),$_POST['codigoAmbiente']);
            }
        }elseif ($opcao=='inserir') {
			$codAmb = "NULL";
			$nomeAmb = $_POST['nomeamb'];
			$ambiente = $_POST['ambiente'];
			$capacidade = $_POST['capacidade'];
			$nAssentosCob = "NULL";
			$nAssentosDescob = "NULL";

			if (isset($_POST['numeroAssentosCoberto']) && isset($_POST['numeroAssentosDescoberto'])){
				$nAssentosCob = $_POST['numeroAssentosCoberto'];
				$nAssentosDescob = $_POST['numeroAssentosDescoberto'];
			}elseif (isset($_POST['numeroAssentosDescoberto']) ){
				$nAssentosCob = "NULL";
				$nAssentosDescob = $_POST['numeroAssentosDescoberto'];
			}elseif(isset($_POST['numeroAssentosCoberto'])) {
				$nAssentosCob = $_POST['numeroAssentosCoberto'];
				$nAssentosDescob = "NULL";
			}
			insert(array('codAmb'=> $codAmb,'ambienteNome' => $nomeAmb,'ambiente'=>$ambiente,'capacidade'=>$capacidade,'nAssentosCob'=>$nAssentosCob,'nAssentosDescob'=>$nAssentosDescob));
        }

	}
	header("Location: ../paginas/Ambiente.php");


?>