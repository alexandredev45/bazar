<?php

class comprador {

    private $codigo;
    private $nome;
    private $email;
    private $telefone;
	private $senacoin;
  	
	function __construct($codigo, $nome, $email, $telefone, $senacoin) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senacoin = $senacoin;
    }
	 
    function getCodigo() {
        return $this->codigo;
    }
	
    function getNome() {
        return $this->nome;
    }
	function getEmail() {
        return $this->email;
    }
 function getTelefone() {
        return $this->telefone;
    }
    function getSenaccoin() {
        return $this->senaccoin;
    }

    

 
function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
function setNome($nome) {
        $this->nome = $nome;
    }	
function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setSenaccoin($senaccoin) {
        $this->senaccoin = $senaccoin;
    }
	

    
    function mostra($conexao, $usuario,$senha) {
		$query = "select * from Comprador where usuario ='$usuario' and senha = '$senha'";
        $stmt = $conexao->query($query);
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		$this->usuario = $user->usuario;
		$this->perfil = $user->perfil;
		$this->nome = $user->Nome;
		
		
    }

		
    
function insere($conexao) {
	try{
$query = "INSERT INTO comprador(nome, email, telefone,senacoin) VALUES ('$this->nome','$this->email','$this->telefone','$this->senacoin')";
$conexao->query($query);
	}catch(Error $e){
		echo $e;
		
	}

}
function deletar($conexao, $cod) {

$query = "delete from comprador where cod= '$cod'";
$stmt=$conexao->prepare($query);

$stmt->execute();


}
function atualiza($conexao,$cod,$qtd) {
		$query = "UPDATE comprador SET senacoin=senacoin+'$qtd' WHERE cod= $cod";
		$stmt=$conexao->prepare($query);
		$stmt->execute();
	
	}
 

 
function alterar($conexao,$cod) {
		$query = "UPDATE comprador SET nome='$this->nome',email='$this->email',telefone='$this->telefone',senacoin='$this->senacoin' WHERE cod= $cod";
		$stmt=$conexao->prepare($query);
		$stmt->execute();
	
	}

}