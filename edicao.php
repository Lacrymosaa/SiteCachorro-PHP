<!DOCTYPE html>
<html>
<head>
    <title>Edição de Cachorro</title>
</head>
<body>
    <?php
        require_once('cachorro.php');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // carrega os dados do cachorro a ser editado
            $cachorro = new Cachorro();
            $c = $cachorro->buscar($_GET['codigo']);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // atualiza os dados do cachorro no banco de dados
            $cachorro = new Cachorro();
            $cachorro->alterar($_POST['codigo'], $_POST['nome'], $_POST['raca'], $_POST['cor'], $_POST['sexo']);
            // redireciona o usuário de volta para a página de listagem
            header('Location: listar.php');
            exit();
        }
    ?>
    <h1>Edição de Cachorro</h1>
    <form method="POST">
        <input type="hidden" name="codigo" value="<?php echo $c['codigo']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $c['nome']; ?>"><br>
        <label>Raça:</label>
        <input type="text" name="raca" value="<?php echo $c['raca']; ?>"><br>
        <label>Cor:</label>
        <input type="text" name="cor" value="<?php echo $c['cor']; ?>"><br>
        <label>Sexo:</label>
        <input type="radio" name="sexo" value="Macho" <?php if ($c['sexo'] === 'Macho') echo 'checked'; ?>>Macho
        <input type="radio" name="sexo" value="Fêmea" <?php if ($c['sexo'] === 'Fêmea') echo 'checked'; ?>>Fêmea<br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
