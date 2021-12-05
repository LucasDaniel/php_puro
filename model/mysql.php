<?php

//inclui a classe dbConfig a classe Mysql
include("dbConfig.php");

/**
* Classe de execução de query do Mysql
* extende de DBconfig para executar as modificações ao banco de dados
*/
class Mysql extends DBConfig {

    /**
     * Variável recebe a sql query para executar. 
     * @access private 
     * @name $sqlQuery
     **/
    private $sqlQuery;

    /**
     * Função da construção do Mysql
     * executa a função connectBD da classe dbConfig para conectar ao Banco de dados
     * @access public
     * @return void 
     * */ 
    public function __construct() {
        $this->connectBD();
    }

    /**
     * Função que insere no banco de dados o cliente passado por parametro
     * @access public
     * @param Cliente $cliente
     * @return void 
     * */ 
    public function insertClient($cliente) {
        $this->sqlQuery = "INSERT INTO `cliente` (`nome_cliente`, `email_cliente`, `telefone_cliente`, `senha_cliente`, `data_nasc_cliente`)
                           VALUES ('".$cliente->getNome()."','".$cliente->getEmail()."',".$cliente->getTelefone().",'".$cliente->getSenha()."','".$cliente->getNascimento()."')";
        $this->conn->query($this->sqlQuery);
    }

    /**
     * Função que seleciona o cliente no banco de dados atravez de seu email
     * @access public
     * @param String $email
     * @return Cliente 
     * */ 
    public function selectClientByEmail($email) {
        $this->sqlQuery = "SELECT * FROM `cliente` WHERE `email_cliente` LIKE '".$email."'";
        $resultClient = $this->conn->query($this->sqlQuery);
        return $resultClient->fetch_assoc();
    }

    /**
     * Função que seleciona o cliente no banco de dados atravez de seu id
     * @access public
     * @param Int $id
     * @return Cliente 
     * */ 
    public function selectClientById($id) {
        $this->sqlQuery = "SELECT * FROM `cliente` WHERE `id_cliente` = ".$id;
        $resultClient = $this->conn->query($this->sqlQuery);
        return $resultClient->fetch_assoc();
    }

    /**
     * Função que edita o cliente no banco de dados atravez de seu id
     * @access public
     * @param Int $id
     * @param Cliente $cliente
     * @return void 
     * */ 
    public function editClientById($id,$cliente) {
        $this->sqlQuery = "UPDATE `cliente`SET `nome_cliente`='".$cliente->getNome()."',`email_cliente`='".$cliente->getEmail()."',`telefone_cliente`=".$cliente->getTelefone().",`senha_cliente`='".$cliente->getSenha()."',`data_nasc_cliente`='".$cliente->getNascimento()."' WHERE `id_cliente` = ".$id;
        $this->conn->query($this->sqlQuery);
    }


}

?>