<?php

/**
* Classe de conexão com o banco de dados
*/
class DBConfig {
    
    /**
     * Variável recebe o nome do servidor. 
     * @access private 
     * @name $servername
     **/ 
    private $servername = "localhost";

    /**
     * Variável recebe o usuario do servidor. 
     * @access private 
     * @name $username
     **/ 
    private $username = "root";

    /**
     * Variável recebe a senha para entrar no servidor. 
     * @access private 
     * @name $password
     **/ 
    private $password = "";

    /**
     * Variável recebe o banco de dados para modifica-lo. 
     * @access private 
     * @name $dbname
     **/ 
    private $dbname = "construsite";
    
    /**
     * Variável recebe a conexão com o banco de dados. 
     * @access protected 
     * @name $conn
     **/ 
    protected $conn;

    /**
     * Função da construção do DBConfig, não esta sendo utilizada
     * @access public
     * @return void 
     * */ 
    public function __construct() {}

    /**
     * Função que conecta com o banco de dados
     * @access protected
     * @return void 
     * */ 
    protected function connectBD() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Falha na conexão - " . $this->conn->connect_error);
        }
    }



}

?>