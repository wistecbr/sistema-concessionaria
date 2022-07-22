<?php
include 'mysql.php';
include 'utils.php';

// post de login
if (isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = md5(htmlspecialchars($_POST['password']));
    verificaLogin($login, $password);
}

if(isset($_GET) && isset($_GET['cadastra'])){
    $cadastra = $_GET['cadastra'];
    // cadastro de USERS
    echo 'valida '. $cadastra;
    var_dump($_POST);
    if($cadastra === 'users' && isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['password']) && isset ($_POST['tipo'])){
            
        $name = htmlspecialchars($_POST['nome']);
        $username = htmlspecialchars($_POST['login']);
        $password = md5(htmlspecialchars($_POST['password']));
        $typeUser = (int)($_POST['tipo']);

        cadastrarUser($name, $username, $password,$typeUser);
    }else if ($cadastra === 'marcas' && isset($_POST['nome'])){
        $name = htmlspecialchars($_POST['nome']);
        cadastraMarca($name);
    } else if ($cadastra === 'veiculos' && isset($_POST['nome']) && isset($_POST['valor']) && 
    isset($_POST['ano']) && isset($_POST['marca']) && isset($_POST['tipo'])){
        $nome = htmlspecialchars($_POST['nome']);
        $valor = (FLOAT) $_POST['valor'];
        $ano = (INT) $_POST['ano'];
        $tipo = (INT) $_POST['tipo'];
        $marca = (INT) $_POST['marca'];
        cadastraVeiculo($nome, $valor, $tipo, $marca, $ano);

    }


}

if(isset($_GET) && isset($_GET['deletar']) && isset($_GET['id'])){
    $tabela = $_GET['deletar'];
    $id = (INT) $_GET['id'];
    deletaElemento($tabela,$id);
}

if(isset($_GET) && isset($_GET['edita'])){
    $edita = $_GET['edita'];
    // Post de edição
    if($edita==='users' && isset($_POST['nome']) && isset($_POST['login']) && isset ($_POST['tipo'])){
        $name = htmlspecialchars($_POST['nome']);
        $login = htmlspecialchars($_POST['login']);
        $typeUser = (int)($_POST['tipo']);

        $id = (int)($_POST['id']);
        editUser($id,$name,$login,$typeUser);
    }else if ($edita === 'marcas' && isset($_POST['nome'])){
        $name = htmlspecialchars($_POST['nome']);
        $id = (int)($_POST['id']);
        editaMarca($id, $name);
    }else if ($edita === 'veiculos' && isset($_POST['nome']) && isset($_POST['valor']) && 
    isset($_POST['ano']) && isset($_POST['marca']) && isset($_POST['tipo'])){
        $nome = htmlspecialchars($_POST['nome']);
        $valor = (FLOAT) $_POST['valor'];
        $ano = (INT) $_POST['ano'];
        $tipo = (INT) $_POST['tipo'];
        $marca = (INT) $_POST['marca'];
        $vendido = 0;
        $id = (INT) $_POST['id'];
        editaVeiculo($id,$nome, $valor, $tipo, $marca, $ano, $vendido);

    }
}

if(isset($_GET) && isset($_GET['logout'])){
    session_start();
    session_destroy();
    header("Location: ../");
}