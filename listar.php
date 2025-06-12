<?php
include "conexao.php";

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Função</th>
        </tr>
        <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $linha['id']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['matricula']; ?></td>
            <td><?php echo $linha['funcao']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="cadastro.html">Cadastrar novo usuário</a>
</body>
</html>
