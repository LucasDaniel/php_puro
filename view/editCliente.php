<?php

//Inclui a classe cliente no editCliente
include("../model/cliente.php");

//Inclui a classe mysql no editCliente
include("../model/mysql.php");

//Cria o Mysql e faz sua conexão com o banco de dados
$mysql   = new Mysql();

//Seleciona o cliente criado através de seu id
$cli = $mysql->selectClientById($_GET['id_cliente']);

//Cria o cliente através do select pelo 'id_cliente'
$cliente = new Cliente($cli['nome_cliente'],$cli['email_cliente'],$cli['telefone_cliente'],$cli['data_nasc_cliente'],$cli['senha_cliente']);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Construsite clientes</title>

        <!--Folha de estilos Bootstrap-->
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">

        <!--Folha de estilos propria-->
        <link rel="stylesheet" type="text/css" href="../lib/css/style.css">

        <!--Codigos Jquery-->
        <script src="../lib/jquery/jquery.min.js" type="text/javascript"></script>

        <!--Controlador dos inputs text-->
        <script src="../controller/formController.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="jumbotron">
            <h3>Construsite - Editar Cliente</h3>
            <hr/>
            <!--Formulario para editar o cadastro do cliente
            id_cli -> id do cliente
            nome -> nome do cliente
            email -> email do cliente
            telefone -> telefone do cliente (é executado a função 'formatTelefone' para modificar o telefone do cliente para (xx)xxxxx-xxxx)
            nascimento -> data de nascimento do cliente (é executado a função 'formatData' para modificar a data de nascimento do cliente para xx/xx/xxxx)
            senha -> senha de acesso do cliente (é executado a função 'verificaSenhas' para ver se as duas senhas são iguais)
            resenha -> redigitar a senha de acesso do cliente (é executado a função 'verificaSenhas' para ver se as duas senhas são iguais)
            -->
            <form id="form" onsubmit="cadastraCliente()" method="POST" action="../php/saveCliente.php">
                <input class="form-control" type="hidden" name="id_cli" id="id_cli" value="<?php echo $cli['id_cliente']; ?>"/>
                <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $cliente->getNome(); ?>" placeholder="Nome" pattern=".{3,}" required title="Minimo de 3 caracteres" required/>
                <input class="form-control" type="text" name="email" id="email" value="<?php echo $cliente->getEmail(); ?>" placeholder="Email" required/>
                <input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo $cliente->getTelefone(); ?>" placeholder="Telefone" pattern=".{14,14}" required title="(xx)xxxxx-xxxx" required/>
                <input class="form-control" type="text" name="nascimento" id="nascimento" value="<?php echo $cliente->getNascimento(); ?>" placeholder="Data de nascimento" pattern=".{10,10}" required title="xx/xx/xxxx" required/>
                <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha (minimo de 6 caracteres)" pattern=".{6,}" required title="minimo de 6 caracteres" required/>
                <input class="form-control" type="password" name="resenha" id="resenha" placeholder="Redigite a senha" pattern=".{6,}" required title="minimo de 6 caracteres" required/>
                <button class="btn btn-primary btn-block" type="submit">Editar cliente</button>
            </form>
        </div>
    </body>
</html>