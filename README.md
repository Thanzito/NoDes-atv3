Criação do Banco de Dados (MySQL)
Execute este código no phpMyAdmin ou no MySQL do XAMPP para criar o banco e a tabela:

sql
Copiar código
CREATE DATABASE cadastro_usuarios;

USE cadastro_usuarios;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    matricula VARCHAR(50),
    funcao VARCHAR(100)
);
✅ 2. conexao.php – Arquivo de conexão com o banco de dados (PHP)
php
Copiar código
<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "cadastro_usuarios";

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}
?>
✅ 3. cadastro.html – Formulário de cadastro de usuários (HTML)
html
Copiar código
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
    <style>
        body { text-align: center; font-family: Arial; }
        form { display: inline-block; margin-top: 50px; text-align: left; }
        input, button { display: block; margin-bottom: 10px; width: 300px; padding: 8px; }
    </style>
</head>
<body>
    <h2>Cadastro de Usuários</h2>
    <form action="inserir.php" method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="matricula" placeholder="Matrícula" required>
        <input type="text" name="funcao" placeholder="Função" required>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="listar.php">Ver lista de usuários</a>
</body>
</html>
✅ 4. inserir.php – Código que insere os dados no banco (PHP)
php
Copiar código
<?php
include "conexao.php";

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$funcao = $_POST['funcao'];

$sql = "INSERT INTO usuarios (nome, matricula, funcao) VALUES ('$nome', '$matricula', '$funcao')";

if (mysqli_query($conexao, $sql)) {
    echo "Usuário cadastrado com sucesso!<br><a href='cadastro.html'>Voltar</a>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
?>
🔵 Essa é a linha principal que envia os dados para o banco de dados:

php
Copiar código
$sql = "INSERT INTO usuarios (nome, matricula, funcao) VALUES ('$nome', '$matricula', '$funcao')";
✅ 5. listar.php – Página que lista os usuários cadastrados (PHP + HTML)
php
Copiar código
<?php
include "conexao.php";

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <style>
        body { text-align: center; font-family: Arial; }
        table { margin: 30px auto; border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #eee; }
    </style>
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
