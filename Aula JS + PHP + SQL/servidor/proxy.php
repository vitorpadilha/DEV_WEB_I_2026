<?php
    require_once './controllers/produto.controller.php';
    require_once './includes/db_connect.php';
    $controller = "";


    // http://localhost/vitor/proxy.php?modulo=produto&acao=editar

    $modulo = isset($_GET['modulo']) ? $_GET['modulo'] : null;
    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : null;

    $dadosEnviados = file_get_contents('php://input');

    $dadosFormatados = json_decode($dadosEnviados, true);

    if($modulo == "produto"){
        $controller = new ProdutoController($conn);
    }
    else if($modulo == "cliente"){
        $controller = new ClienteController($conn);
    }
    else {
        die("Módulo não encontrado");
    }

    if($acao == "listar"){
        echo json_encode($controller->listarTodos($dadosFormatados));
    }
    else if($acao == "editar"){
        echo json_encode($controller->atualizar($dadosFormatados));
    } 
    else if($acao == "salvar"){
        echo json_encode($controller->cadastrar($dadosFormatados));
    }
    else if($acao == "deletar"){
        echo json_encode($controller->deletar($dadosFormatados));
    }
    else {
        die("Ação não encontrada");
    }
?>