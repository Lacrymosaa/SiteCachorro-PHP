<?php
// Inclui o arquivo de configuração com a conexão com o banco de dados
require_once 'conexao.php';
// Inclui a classe Cachorro
require_once 'cachorro.php';

// Verifica se o código do cachorro foi enviado via GET
if (isset($_GET['codigo'])) {
    // Cria um objeto da classe Cachorro
    $cachorro = new Cachorro();

    // Obtém o código do cachorro via GET
    $codigo = $_GET['codigo'];

    // Verifica se o cachorro existe no banco de dados
    if ($cachorro->buscar($codigo)) {
        // Exclui o cachorro do banco de dados
        $cachorro->excluir($codigo);
        // Redireciona para a listagem de cachorros
        header('Location: ../listar.php');
        exit;
    } else {
        // Se o cachorro não existe, exibe uma mensagem de erro
        echo "Cachorro não encontrado.";
    }
} else {
    // Se o código do cachorro não foi enviado via GET, exibe uma mensagem de erro
    echo "Código do cachorro não informado.";
}
