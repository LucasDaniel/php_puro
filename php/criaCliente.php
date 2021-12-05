<?php

    //Inclui a classe cliente no criaCliente
    include("../model/cliente.php");

    //Inclui a classe mysql no criaCliente
    include("../model/mysql.php");

    //Cria o cliente através dos dos POSTS passados pelo 'index.html'
    $cliente = new Cliente($_POST['nome'],$_POST['email'],$_POST['telefone'],$_POST['nascimento'],$_POST['senha']);
    
    //Cria o Mysql e faz sua conexão com o banco de dados
    $mysql   = new Mysql();

    //Insere o cliente no banco de dados
    $mysql->insertClient($cliente);

    //Seleciona o cliente criado através de seu email
    $cli = $mysql->selectClientByEmail($cliente->getEmail());

    //Imprime na tela o link pro usuario ir pro 'editCliente.php' para modificar o cliente
    echo "Clique no link abaixo para editar o cliente criado<br><br>";
    echo "<a href='../view/editCliente.php?id_cliente=".$cli['id_cliente']."'>localhost/construsite/view/editCliente.php?id_cliente=".$cli['id_cliente']."</a>";

?>