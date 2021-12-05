<?php

/**
* Entidade Cliente
*/
class Cliente {
    
    /**
     * Variável recebe o nome do cliente. 
     * @access private 
     * @name $nome
     **/ 
    private $nome;

    /**
     * Variável recebe o email do cliente. 
     * @access private 
     * @name $email
     **/ 
    private $email;

    /**
     * Variável recebe o telefone do cliente. 
     * @access private 
     * @name $telefone
     **/ 
    private $telefone;

    /**
     * Variável recebe a data de nascimento do cliente. 
     * @access private 
     * @name $nascimento
     **/ 
    private $nascimento;

    /**
     * Variável recebe a senha de acesso do cliente. 
     * @access private 
     * @name $senha
     **/ 
    private $senha;

    /**
     * Função de construção da entidade cliente
     * recebe por parametro seus dados e salva-os
     * @access public
     * @param String $nome
     * @param String $email
     * @param String $telefone
     * @param String $nascimento
     * @param String $senha
     * @return void 
     * */ 
    public function __construct($nome,$email,$telefone,$nascimento,$senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $this->getNumbers($telefone);
        $this->nascimento = $this->arrumaNascimento($nascimento);
        $this->senha = $senha;
    }

    /**
     * Função para pegar o nome do usuario
     * @access public
     * @return String 
     * */ 
    public function getNome() {
        return $this->nome;
    }

    /**
     * Função para estabelecer o nome do usuario
     * @access public
     * @param String $nome
     * @return void 
     * */ 
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * Função para pegar o email do usuario
     * @access public
     * @return String 
     * */ 
    public function getEmail() {
        return $this->email;
    }

    /**
     * Função para estabelecer o email do usuario
     * @access public
     * @param String $email
     * @return void 
     * */ 
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Função para pegar o telefone do usuario
     * @access public
     * @return String 
     * */ 
    public function getTelefone() {
        return $this->telefone;
    }

    /**
     * Função para estabelecer o telefone do usuario
     * @access public
     * @param String $telefone
     * @return void 
     * */ 
    public function setTelefone($telefone) {
        $this->telefone = $this->getNumbers($telefone);
    }

    /**
     * Função para pegar a data de nascimento do usuario
     * @access public
     * @return String 
     * */ 
    public function getNascimento() {
        return $this->nascimento;
    }

    /**
     * Função para estabelecer a data de nascimento do usuario
     * @access public
     * @param String $nascimento
     * @return void 
     * */ 
    public function setNascimento($nascimento) {
        $this->nascimento = $this->arrumaNascimento($nascimento);
    }

    /**
     * Função para pegar a senha de acesso do usuario
     * @access public
     * @return String 
     * */ 
    public function getSenha() {
        return $this->senha;
    }

    /**
     * Função para estabelecer a senha de acesso do usuario
     * @access public
     * @param String $senha
     * @return void 
     * */ 
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getNumbers($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }

    /**
     * Verifica se o nascimento enviado veio do banco de dados ou do usuario
     * se vier do banco de dados modifica ele para mostrar pro usuario = return "xxxxxxxx"
     * se veio do usuario, modifica-o para envia-lo pro banco de dados = return "xxxx-xx-xx"
     * @access public
     * @param String $str - data vindo do usuario ou banco de dados
     * @return void 
     * */
    public function arrumaNascimento($str) {
        if (preg_match('/'.'-'.'/', $str)) {
            $str = explode("-",$str);
            return $str[2].$str[1].$str[0];
        } else {
            $str = explode("/",$str);
            return $str[2]."-".$str[1]."-".$str[0];
        }
    }

}

?>