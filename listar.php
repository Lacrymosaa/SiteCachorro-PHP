<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Cachorros</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
        require_once('cachorro.php');
        $cachorro = new Cachorro();
        $cachorros = array();

        if (isset($_POST['busca']) && !empty($_POST['busca'])) {
            $cachorros = $cachorro->buscarN($_POST['busca']);
        } else {
            $cachorros = $cachorro->listar();
        }
    ?>
    <h1>Listagem de Cachorros</h1>
    <a href="cadastro.php">Novo Cachorro</a>
    <br><br>
    <form method="POST">
        <label for="busca">Buscar por nome:</label>
        <input type="text" id="busca" name="busca">
        <button type="submit">Buscar</button>
    </form>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Raça</th>
            <th>Cor</th>
            <th>Sexo</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($cachorros as $c) { ?>
        <tr>
            <td><?php echo $c['codigo']; ?></td>
            <td><?php echo $c['nome']; ?></td>
            <td><?php echo $c['raca']; ?></td>
            <td><?php echo $c['cor']; ?></td>
            <td><?php echo $c['sexo']; ?></td>
            <td>
                <a href="edicao.php?codigo=<?php echo $c['codigo']; ?>">Editar</a>
                <a href="exclusao.php?codigo=<?php echo $c['codigo']; ?>">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
